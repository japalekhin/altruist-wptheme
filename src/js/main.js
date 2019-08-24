import 'babel-polyfill';
import Vue from 'vue/dist/vue.esm';
import script2 from 'vue-script2';
import mailingListSubscribeForm from '../components/mailing-list-subscribe-form.vue';
import $ from 'jquery';

Vue.use(script2);
Vue.component('mailingListSubscribeForm', mailingListSubscribeForm);
new Vue({
  el: '#app',
  template: '#app',
});

$(() => {
  if ($('.contactForm').length > 0) {
    (() => {
      let theForm = $('form.contactForm');
      let _nonce = $('#_wpnonce');
      let txtName = $('#txtName');
      let txtEmail = $('#txtEmail');
      let txtSubject = $('#txtSubject');
      let txtMessage = $('#txtMessage');
      let btnSend = $('#btnSend');

      const showMessage = function (message, variant) {
        $('.alert').removeClass('alert-success alert-danger').addClass(`alert-${variant}`).html(message).show();
      };
      const hideMessage = function () {
        $('.alert').hide();
      };
      const enableForm = function () {
        theForm.removeAttr('disabled');
        txtName.removeAttr('disabled');
        txtEmail.removeAttr('disabled');
        txtSubject.removeAttr('disabled');
        txtMessage.removeAttr('disabled');
        btnSend.removeAttr('disabled');
      };
      const disableForm = function () {
        theForm.attr('disabled', true);
        txtName.attr('disabled', true);
        txtEmail.attr('disabled', true);
        txtSubject.attr('disabled', true);
        txtMessage.attr('disabled', true);
        btnSend.attr('disabled', true);
      };
      const send = async function (name, email, subject, message, nonce) {
        const result = {
          success: false,
          message: 'Unknown error!',
        };

        if (name === '') {
          result.message = 'Please enter your name!';
          return result;
        }
        if (email === '') {
          result.message = 'Please enter your email!';
          return result;
        }
        if (subject === '') {
          result.message = 'Please enter a subject!';
          return result;
        }
        if (message === '') {
          result.message = 'Please enter your message!';
          return result;
        }

        const postResult = await new Promise((rs) => {
          $.ajax({
            cache: false,
            data: { nonce, name, email, subject, message, },
            error() {
              rs(false);
            },
            global: false,
            method: 'POST',
            success(data) {
              rs(data);
            },
            url: '/wp-json/altruist/v1/send-contact',
          });
        });
        if (postResult === false) {
          result.message = 'A communication error occurred!';
          return result;
        }
        if (postResult !== 'sent') {
          result.message = postResult;
          return result;
        }

        result.success = true;
        result.message = postResult;
        return result;
      };


      theForm.on('submit', async (e) => {
        e.preventDefault();

        disableForm();
        let name = txtName.val().trim();
        let email = txtEmail.val().trim();
        let subject = txtSubject.val().trim();
        let message = txtMessage.val().trim();
        let nonce = _nonce.val();

        hideMessage();
        const result = await send(name, email, subject, message, nonce);
        if (result.success) {
          txtName.val('');
          txtEmail.val('');
          txtSubject.val('');
          txtMessage.val('');
          showMessage('Your message has been sent!', 'success');
        } else {
          showMessage(result.message, 'danger');
        }
        enableForm();

      });
      enableForm();
    })();
  }
});