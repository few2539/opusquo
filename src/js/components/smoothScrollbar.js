window.smooth_scrollbar = {
  slideCustomScroll: '',
  customScroll: '',
  lastDirection: '',
  lastOffset: 0,
  init: function() {
    if ( window.simplified.smoothscrollVersion() ) {
      window.smooth_scrollbar.customScroll = Scrollbar.init(jQuery('[data-scrollbar]')[0], {
        syncCallbacks: !0
      });
    }
  }
};
site.ready.push(function() {
  window.smooth_scrollbar.init();
});
