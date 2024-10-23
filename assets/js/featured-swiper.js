var swiper = new Swiper(".mySwiper", {
  slidesPerView: 1,
  spaceBetween: 30,
  loop: true,
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
  breakpoints: {
    640: {
      slidesPerView: 2,
    },
    868: {
      slidesPerView: 3,
    },
    1024: {
      slidesPerView: 3,
    },
  },
});

var heroSwiper = new Swiper(".hero-swiper", {
  slidesPerView: 1,
  spaceBetween: 30,
  loop: true,
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
  breakpoints: {
    640: {
      slidesPerView: 1,
    },
    868: {
      slidesPerView: 1,
    },
    1024: {
      slidesPerView: 1,
    },
  },
});
