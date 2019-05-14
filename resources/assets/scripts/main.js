import 'bootstrap';
import Vue from 'vue/dist/vue.esm';
import debounce from 'debounce';

let vm = new Vue({
  el: '#appContent',
  template: '#appContent',
  data: {
    scrollPercentage: 0,
  },
  created() {
    window.addEventListener('scroll', this.onWindowScroll);
    this.calculateWindowScroll();
  },
  destroyed() {
    window.removeEventListener('scroll', this.onWindowScroll);
  },
  methods: {
    calculateWindowScroll() {
      let h = document.documentElement, b = document.body, st = 'scrollTop', sh = 'scrollHeight';
      this.scrollPercentage = ((h[st] || b[st]) / ((h[sh] || b[sh]) - h.clientHeight) * 100) + '%';
    },
    onWindowScroll() { this.calculateWindowScroll(); }
    // onWindowScroll: debounce(function () {
    //   this.calculateWindowScroll();
    // }, 30),
  },
});
