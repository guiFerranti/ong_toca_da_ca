import './bootstrap';
import Swiper from 'swiper';
import 'swiper/css';
import Swal from 'sweetalert2';
import Alpine from 'alpinejs'

window.Swal = Swal;

window.Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 5000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer);
        toast.addEventListener('mouseleave', Swal.resumeTimer);
    }
});

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

document.addEventListener('DOMContentLoaded', () => {
    window.Alpine = Alpine;
    Alpine.start();
});
