window.tools = {
  keys: {
    37: 1,
    38: 1,
    39: 1,
    40: 1
  },
  globalViewportW: '',
  globalViewportH: '',
  HeaderHeight: '',
  init: function() {
    $('a[href="#"]').click(function(e) {
      e.preventDefault()
    });

    $('p').each(function() {
      var $this = $(this);
      if($this.html().replace(/\s|&nbsp;/g, '').length == 0)
      $this.remove();
    });
  },
  calculateGlobalValues: function() {
    window.tools.globalViewportW = verge.viewportW(),
    window.tools.globalViewportH = verge.viewportH();
    window.tools.HeaderHeight = jQuery('.site-header .header-outer.light-theme').outerHeight(),
    window.tools.HeaderHeight = Math.ceil(window.tools.HeaderHeight);
  },
  preventDefault: function(e) {
    e = e || window.event,
    e.preventDefault && e.preventDefault(),
    e.returnValue = !1
  },
  preventDefaultForScrollKeys: function(e) {
    if (window.tools.keys[e.keyCode])
    return window.tools.preventDefault(e),
    !1
  },
  disableScroll: function() {
    window.addEventListener && window.addEventListener("DOMMouseScroll", window.tools.preventDefault, !1),
    window.onwheel = window.tools.preventDefault,
    window.onmousewheel = document.onmousewheel = window.tools.preventDefault,
    window.ontouchmove = window.tools.preventDefault,
    document.onkeydown = window.tools.preventDefaultForScrollKeys
  },
  enableScroll: function() {
    window.removeEventListener && window.removeEventListener("DOMMouseScroll", window.tools.preventDefault, !1),
    window.onmousewheel = document.onmousewheel = null,
    window.onwheel = null,
    window.ontouchmove = null,
    document.onkeydown = null
  }
};

site.ready.push(function(){
  window.tools.init();
  window.tools.calculateGlobalValues();
});
site.resize.push(window.tools.calculateGlobalValues);
