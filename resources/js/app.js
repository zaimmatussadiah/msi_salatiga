// Default Laravel bootstrapper, installs axios
import './bootstrap';

// Import Jquery
// import '../../public/assets/jquery/jquery.min'

// Added: Actual Bootstrap JavaScript dependency
import 'bootstrap';

// Added: Popper.js dependency for popover support in Bootstrap
import '@popperjs/core';

// Bootsrap Icon
import 'bootstrap-icons/font/bootstrap-icons.css'

// AOS
import AOS from 'aos';
import 'aos/dist/aos.css'; 
// You can also use <link> for styles
// ..
AOS.init();

// Glightbox
// Using a bundler like webpack
import 'glightbox';

// Isotop
import 'isotope-layout';

// Swiper
import 'swiper';
import 'swiper/css';
import Swiper from 'swiper';

const swiper = new Swiper();

import PureCounter from "@srexi/purecounterjs";
const pure = new PureCounter();

document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
})