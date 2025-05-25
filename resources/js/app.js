import './bootstrap';
import Swiper from 'swiper';
import 'swiper/css';

document.addEventListener('DOMContentLoaded', function () {
    new Swiper('.animais-carrossel', {
        slidesPerView: 1,
        spaceBetween: 16,
        slidesPerGroup: 1,
        breakpoints: {
            640: {
                slidesPerView: 2,
                slidesPerGroup: 2
            },
            1024: {
                slidesPerView: 4,
                slidesPerGroup: 4
            },
            1280: {
                slidesPerView: 6,
                slidesPerGroup: 6
            }
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
});
