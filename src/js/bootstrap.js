import * as axios from 'axios';
import * as _ from 'lodash';
import * as $ from 'jquery';

// !** Don't need to change this but we may be don't need this in the future
window._ = _;
window.$ = window.jQuery = $;

// !** Modernizr and Detectizr
require('imports-loader?this=>window!../vendors/modernizr-custom.js');
require('imports-loader?this=>window!../../node_modules/detectizr/dist/detectizr.js');

// !** Your jQuery plugins goes here
import './modules/components/nav.js';
import './modules/components/content_form';
window.verge = require('verge');
window.Scrollbar = require('../../node_modules/smooth-scrollbar/dist/smooth-scrollbar.js');
window.plyr = require('../vendors/plyr/plyr.js');
window.shuffle = require('imports-loader?$=jquery!../../node_modules/shufflejs/dist/shuffle.min.js');
window.ScrollMagic = require('../../node_modules/scrollmagic/scrollmagic/minified/ScrollMagic.min.js');

require("imports-loader?define=>false!../vendors/picker/picker.js");
require("imports-loader?define=>false!../vendors/picker/picker.date.js");


require('imports-loader?$=jquery!../vendors/jquery-ui.min.js');
require('../../node_modules/jquery-mousewheel/jquery.mousewheel.js');
require("../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js");
require('./base/global.js');
require('./base/base.js');
require('./utils/tools.js');
require('./utils/checkIE.js');
require('./utils/simplified.js');
require("../vendors/lazysizes.min.js");
require("../vendors/object-fit/ls.object-fit.min.js");
require("../vendors/parent-fit/ls.parent-fit.min.js");
require("../vendors/respimg/ls.respimg.min.js");
require("../vendors/bgset/ls.bgset.min.js");
require('./components/video.js');
require('./components/smoothScrollbar.js');
require('./components/filter.js');
require('./components/filtertemplate.js');
require('../vendors/jquery-selectric/jquery.selectric.js');
require('../../node_modules/slick-carousel/slick/slick.min.js');

require('./components/datepicker.js');

//------------------------------------------------------------
// !** Responsive framework, choose one from below if you want to use either of them

/**************
* Bootstrap 4 *
**************/
/* DO NOT forget to run 'npm i -S bootstrap@4.0.0-alpha.6' */
// require('imports-loader?$=jquery,Tether=Tether!../../node_modules/bootstrap/dist/js/bootstrap.js');

/***************************
* Zurb Foundation for Site *
***************************/
// require('imports-loader?$=jquery!../../node_modules/foundation-sites/dist/js/foundation.js');


// ========= Ignore below code, it's for the Laravel system ==========
/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

const token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
	window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
}
