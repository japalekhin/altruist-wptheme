<template>
  <form
    class="mailingListSubscribeForm rounded shadow"
    :disabled="isSubmitting"
    novalidate
    @submit.prevent="onSubmit"
  >
    <div class="title font-copy mb-3">Like what you just read?</div>
    <div class="action mb-3">
      <subscribe-flasher v-if="!isSubmitting"></subscribe-flasher>
      <subscribe-loader v-if="isSubmitting"></subscribe-loader>
      <span>Subscribe to receive updates when new content is available.</span>
    </div>
    <div class="message alert" :class="messageClass" v-if="message.isVisible">{{ message.message }}</div>
    <div class="formElements">
      <div class="textBoxes">
        <div class="nameFormGroup form-group">
          <label for="txtName">
            <small>Name</small>
          </label>
          <input
            type="text"
            class="form-control rounded-sm"
            id="txtName"
            name="name"
            placeholder="Enter your name"
            required
            :disabled="isSubmitting"
            v-model="form.name"
          />
        </div>
        <div class="emailFormGroup form-group">
          <label for="txtEmail">
            <small>Email address</small>
          </label>
          <input
            type="email"
            class="form-control rounded-sm"
            id="txtEmail"
            placeholder="Enter email"
            required
            :disabled="isSubmitting"
            v-model="form.email"
          />
        </div>
      </div>
      <div class="submitContainer d-flex flex-column align-items-stretch">
        <button type="submit" class="btn btn-lg btn-secondary" :disabled="isSubmitting">Sign me up!</button>
      </div>
    </div>
    <div>
      <small class="form-text">
        <i class="fas fa-thumbs-up mr-2"></i> I'll
        <strong>never</strong> share your email with anyone.
      </small>
    </div>
  </form>
</template>

<script>
import fetch from "isomorphic-fetch";
import subscribeFlasher from "./subscribe-flasher.vue";
import subscribeLoader from "./subscribe-loader.vue";

export default {
  name: "mailingListSubscribeForm",
  components: { subscribeFlasher, subscribeLoader },
  props: {
    browserSession: {
      type: String,
      required: true,
      default: ""
    }
  },
  data() {
    return {
      message: {
        isVisible: false,
        variant: "",
        message: ""
      },
      isSubmitting: false,
      form: {
        name: "",
        email: ""
      }
    };
  },
  computed: {
    messageClass() {
      let classes = [];
      if (this.message.variant === "") {
        classes.push("alert-info");
      } else {
        classes.push(`alert-${this.message.variant}`);
      }
      return classes;
    }
  },
  methods: {
    showMessage(message, variant) {
      message = message || "Unknown error!";
      variant = variant || "danger";
      this.message.message = message.toString().trim();
      this.message.variant = variant;
      this.message.isVisible = true;
    },
    hideMessage() {
      this.isVisible = false;
    },
    async onSubmit() {
      this.hideMessage();
      this.isSubmitting = true;
      let result;
      fetch("/wp-json/altruist/v1/mailing-list-subscribe", {
        method: "POST",
        body: JSON.stringify({
          nonce: this.browserSession,
          name: this.form.name.trim(),
          email: this.form.email.trim()
        }),
        headers: {
          "Content-Type": "application/json"
        }
      })
        .catch(() =>
          this.showMessage(
            "Network error! Are you connected to the internet?",
            "warning"
          )
        )
        .finally(() => (this.isSubmitting = false))
        .then(result => {
          if (!result.ok || result.status !== 200) {
            return this.showMessage(
              "An error occurred in the server!",
              "danger"
            );
          }
          return result.json();
        })
        .then(message => {
          if (typeof message === "undefined") {
            return;
          }
          if (message == "subscribed") {
            this.form.name = "";
            this.form.email = "";
            return this.showMessage("Thank you for subscribing!", "success");
          }
          if (message == "already_subscribed") {
            this.form.name = "";
            this.form.email = "";
            return this.showMessage(
              "It seems you're already subscribed! Thank you.",
              "info"
            );
          }
          return this.showMessage(message, "danger");
        });
    }
  }
};
</script>

<style lang="scss" scoped>
.mailingListSubscribeForm {
  .title {
    font-size: 1.5rem;
    line-height: 1.2;
  }
}
</style>