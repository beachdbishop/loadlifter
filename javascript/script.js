/**
 * The JavaScript code you place here will be processed by esbuild, and the
 * output file will be created at `../theme/js/script.min.js` and enqueued in
 * `../theme/functions.php`.
 *
 * For esbuild documentation, please see:
 * https://esbuild.github.io/
 */


// var ready = (callback) => {
//   if (document.readyState != "loading") callback();
//   else document.addEventListener("DOMContentLoaded", callback);
// }

const navHeader = document.querySelector('.nav-header')
const navToggle = document.querySelector('.toggle-mobile-nav');
const navMenu = document.querySelector('#primary-navigation');

navToggle.addEventListener('click', () => {
  navMenu.hasAttribute('data-visible')
    ? navToggle.setAttribute('aria-expanded', false)
    : navToggle.setAttribute('aria-expanded', true);
  navMenu.toggleAttribute('data-visible');
  // navHeader.toggleAttribute('data-overlay');
});

navMenu.addEventListener('keyup', e => {
  if (e.code === 'Escape') {
    navToggle.setAttribute('aria-expanded', false);
  }
});


/**
 * Handle toggle events
 * @param  {Event} event The Event object
 */
window.toggleHandler = function( event ) {

	// Only run if accordion is open
	if (!event.target.hasAttribute('open')) return;

	// Only run on accordions inside our selector
	let parent = event.target.closest('[data-accordion]');
	if (!parent) return;

	// Get all open accordions inside parent
	let opened = parent.querySelectorAll('details[open]');

	// Close open ones that aren't current accordion
	for (let accordion of opened) {
		if (accordion === event.target) continue;
		accordion.removeAttribute('open');
	}

}
document.addEventListener('toggle', toggleHandler, true);
