<template>
  <span class="subscribeFlasher">
    <span class="flasher" :class="flasherClass"></span>
    <i class="bellIcon fas fa-bell fa-fw" :class="ringerClass"></i>
  </span>
</template>

<script>
export default {
  name: "subscribe-flasher",
  data() {
    return {
      flasherClass: [],
      ringerClass: []
    };
  },
  created() {
    this.flash();
    this.ring();
  },
  methods: {
    flash() {
      this.flasherClass = [];
      window.setTimeout(() => this.flasherClass.push("flash"), 0);
      window.setTimeout(this.flash, 2000 + Math.random() * 3000);
    },
    ring() {
      this.ringerClass = [];
      window.setTimeout(() => this.ringerClass.push("ring"), 0);
      window.setTimeout(this.ring, 1000 + Math.random() * 5000);
    }
  }
};
</script>

<style lang="scss" scoped>
@keyframes ring {
  0% {
    transform: rotate(0);
  }
  20% {
    transform: rotate(-10deg);
  }
  40% {
    transform: rotate(10deg);
  }
  60% {
    transform: rotate(-10deg);
  }
  80% {
    transform: rotate(10deg);
  }
  100% {
    transform: rotate(0);
  }
}

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
  .bellIcon {
    position: relative;
    &.ring {
      animation: ring 0.5s;
    }
  }
}
</style>
