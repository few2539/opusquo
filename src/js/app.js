/* === Application's main css and js vendors file === */
import '../sass/main.scss';
import './bootstrap.js';




/* === Import modules to init when the page initialized === */
import { init as MainInit} from './components/main';
import { init as filterInit } from './components/filter';
import { init as carouselInit } from './components/carousel';

/* Constant that needed in page initialization */

window.initFilter = filterInit;

/* === Initilize function === */
const initApp = () => {
	/* First, init the modules that requires for functional when page loaded
	* e.g. carousel, masonry, parallax etc. 
	* Since these modules may not be required for every page,
	* you can check if it's the page you want before calling the method */
	MainInit();
  carouselInit();

	/* Then, check if there is any window.initPage was declared in the specified page.
		* If there is, run the specific page scripts via window.initPage() */
	if (typeof window.initPage === 'function') {
		window.initPage(window);
	}
};

/* === Load font === */
window.onload = () => {
	initApp();
};
