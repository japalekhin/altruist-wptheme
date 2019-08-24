<template>
  <span class="subscribeFlasher mr-2">
    <span class="flasher" :class="flasherClass"></span>
    <i class="fas fa-bell fa-fw"></i>
  </span>
</template>

<script>
export default {
  name: "subscribe-flasher",
  data() {
    return {
      flasherClass: []
    };
  },
  created() {
    this.flash();
  },
  methods: {
    flash() {
      this.flasherClass = [];
      window.setTimeout(() => {
        this.flasherClass.push("flash");
      }, 0);
      window.setTimeout(this.flash, 3000 + Math.random() * 6000);
    }
  }
};
</script>

<style lang="scss" scoped>
.subscribeFlasher {
  position: relative;
  .flasher {
    bottom: 0;
    height: 0;
    left: 0;
    margin: auto;
    position: absolute;
    right: 0;
    top: 0;
    width: 0;
    &::before {
      background-color: rgba(#fff, 0.4);
      bottom: -1.5rem;
      border-radius: 999rem;
      content: "";
      display: block;
      left: -1.5rem;
      height: 3rem;
      position: absolute;
      right: -1.5rem;
      top: -1.5rem;
      transform: scale(0);
      width: 3rem;
    }
    &.flash::before {
      background-color: rgba(#fff, 0);
      transform: scale(1);
      transition: all 1s ease-in;
    }
  }
  i {
    position: relative;
  }
}
</style>