
$(document).ready(function () {
  if ($(".swiper-centered-slides").length) {
    // centered slides option-1
    new Swiper('.swiper-centered-slides', {
      slidesPerView: 'auto',
      centeredSlides: true,
      spaceBetween: 30,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  }
    
  });
  