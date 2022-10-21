import Swiper, { Navigation } from 'swiper';
import 'swiper/css';
import 'swiper/css/navigation';

(function () {
    document.addEventListener('DOMContentLoaded', function() {
        if (document.querySelector('.slider')) {
            new Swiper('.slider', {
                modules: [Navigation],
                slidesPerView: 1,
                spaceBetween: 15,
                freeMode: true,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev'
                },
                breakpoints: {
                    768 : {
                        slidesPerView: 2
                    },
                    1024: {
                        slidesPerView: 3 
                    },
                    1200: {
                        slidesPerView: 4
                    }
                }
            });
        }
    });
})();