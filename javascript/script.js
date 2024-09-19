/**
 * Front-end JavaScript
 *
 * The JavaScript code you place here will be processed by esbuild. The output
 * file will be created at `../theme/js/script.min.js` and enqueued in
 * `../theme/functions.php`.
 *
 * For esbuild documentation, please see:
 * https://esbuild.github.io/
 */
import Alpine from 'alpinejs'

// import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle'
window.Swiper = Swiper
window.Alpine = Alpine

import MainNav from './scripts/main-nav'

MainNav()

Alpine.start()
