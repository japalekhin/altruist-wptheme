import 'bootstrap';
import Vue from 'vue';

let vm = new Vue({
  el: '#app',
  template: '#appContent',
  data: {
    title: 'yes',
  },
  created() {
    console.log('vue has been created');
  }
});
