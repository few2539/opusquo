
window.b_detectie = {
  isIE: '',
  IEVersion: '',
  init: function() {
    b_detectie.detectIE();
    b_detectie.detectIEVersion();
  },
  detectIE: function() {
    if(Modernizr.ie) {
      b_detectie.isIE = true;
    }
  },
  detectIEVersion: function() {
    if(Modernizr.ie9 || Modernizr.ie8) {
      b_detectie.IEVersion = true;
    }
  }
}

site.ready.push(b_detectie.init);
