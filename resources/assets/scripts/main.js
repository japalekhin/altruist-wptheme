import 'bootstrap';
import Vue from 'vue/dist/vue.esm';
import debounce from 'debounce';

let vm = new Vue({
  el: '#appContent',
  template: '#appContent',
  data: {
    headerElement: null,
    windowHeight: 0,
    headerHeight: 0,
    headerHeightWithMargin: 0,
    scrollPercentage: 0,
  },
  computed: {
    mainSectionStyle() {
      return {
        'margin-top': `${this.headerHeight}px`,
      }
    },
    frontpageCoverStyle() {
      const height = this.windowHeight - this.headerHeightWithMargin;
      return {
        height: `${height}px`,
      };
    }
  },
  created() {
    window.addEventListener('resize', this.onWindowResize);
    this.onWindowResize();
    window.addEventListener('scroll', this.onWindowScroll);
    this.calculateWindowScroll();
  },
  destroyed() {
    window.removeEventListener('scroll', this.onWindowScroll);
  },
  methods: {
    calculateWindowScroll() {
      let h = document.documentElement, b = document.body, st = 'scrollTop', sh = 'scrollHeight';
      let percentage = Math.max(0, Math.min(1, (h[st] || b[st]) / ((h[sh] || b[sh]) - h.clientHeight)));
      this.scrollPercentage = (percentage * 100) + '%';
    },
    onWindowScroll() { this.calculateWindowScroll(); },
    // onWindowScroll: debounce(function () {
    //   this.calculateWindowScroll();
    // }, 30),
    onWindowResize() {
      if (this.headerElement === null) {
        this.headerElement = document.getElementById('header');
      }
      this.windowHeight = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
      this.headerHeight = this.getElementOuterHeight(this.headerElement);
      this.headerHeightWithMargin = this.getElementOuterHeight(this.headerElement, true);
    },
    getElementOuterHeight(element, includeMargin) {
      includeMargin = !!includeMargin;
      let elementHeight, elementMargin;
      if (document.all) {
        elementHeight = element.currentStyle.height;
        elementMargin = parseInt(element.currentStyle.marginTop, 10) + parseInt(element.currentStyle.marginBottom, 10);
      } else {
        elementHeight = document.defaultView.getComputedStyle(element, '').getPropertyValue('height');
        elementMargin = parseInt(document.defaultView.getComputedStyle(element, '').getPropertyValue('margin-top')) + parseInt(document.defaultView.getComputedStyle(element, '').getPropertyValue('margin-bottom'));
      }
      elementHeight = parseFloat(elementHeight);
      if (isNaN(elementHeight)) {
        elementHeight = 0;
      }
      elementMargin = parseFloat(elementMargin);
      if (isNaN(elementMargin)) {
        elementMargin = 0;
      }

      return (elementHeight + (includeMargin ? elementMargin : 0));
    }
  },
});
