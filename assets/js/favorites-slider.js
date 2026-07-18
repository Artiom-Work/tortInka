import pxToRem from "./utils/pxToRem.js"

document.addEventListener('DOMContentLoaded', function () {
	const sliderEl = document.querySelector('.favorites__slider');
	const mediaQuery = window.matchMedia(`(min-width:${pxToRem(1024)}rem`);

	let swiperInstance = null;
	function initSlider() {
		if (swiperInstance) return;

		swiperInstance = new Swiper(sliderEl, {
			slidesPerView: 'auto',
			centeredSlides: true,
			spaceBetween: 15,
			loop: true,
			preloadImages: false,
			lazy: {
				loadPrevNext: true,
				loadPrevNextAmount: 1,
				loadOnTransitionStart: true,
				checkInView: true,
			},
			effect: 'coverflow',
			coverflowEffect: {
				rotate: 35,
				stretch: -20,
				depth: 200,
				modifier: 1.3,
				slideShadows: false,
			},
			breakpoints: {
				420: {
					coverflowEffect: {
						stretch: -40,
						rotate: 25,
					}
				},
				768: {
					spaceBetween: 200,
					coverflowEffect: {
						stretch: -40,
						rotate: 15,
					}
				},
			},
		});
	}

	function destroySlider() {
		if (!swiperInstance) return;

		swiperInstance.destroy(true, true);
		swiperInstance = null;
	}

	function handleBreakpointChange(e) {
		if (e.matches) {
			destroySlider();
		} else {
			initSlider();
		}
	}

	handleBreakpointChange(mediaQuery);
	mediaQuery.addEventListener('change', handleBreakpointChange);
});