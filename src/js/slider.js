import Swiper from 'swiper';
import 'swiper/css';

document.addEventListener('DOMContentLoaded', function() {
    if (document.querySelector('.slider')) {
        opciones = {

        };
        new Swiper('.slider', opciones);
    }
});