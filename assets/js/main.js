// import Header from './Header.js'
// import ExpandableContentCollection from './ExampleClassFile.js'

// new Header()
// new ExpandableContentCollection()


const hero = document.querySelector('.hero');
const mainBg = document.querySelector('.parallax-bg--main');

// Максимальное смещение вниз (в пикселях) – например, 20% от высоты секции
const maxTranslate = hero.offsetHeight * 1;

function updateParallax() {
	const rect = hero.getBoundingClientRect();
	const windowHeight = window.innerHeight;

	// Прогресс от 0 до 1: 0 – секция только появилась снизу, 1 – полностью ушла наверх
	const progress = Math.min(1, Math.max(0, (windowHeight - rect.top) / (rect.height + windowHeight)));

	// Смещаем фон вниз (положительное значение)
	const translateY = progress * maxTranslate;

	mainBg.style.transform = `translate3d(0, ${translateY}px, 0)`;
}

// // Оптимизация через requestAnimationFrame
// let ticking = false;
// window.addEventListener('scroll', () => {
// 	if (!ticking) {
// 		requestAnimationFrame(() => {
// 			updateParallax();
// 			ticking = false;
// 		});
// 		ticking = true;
// 	}
// });

// // Обновляем при изменении размера окна и загрузке
// window.addEventListener('resize', () => {
// 	// Пересчитываем maxTranslate при изменении высоты секции
// 	maxTranslate = hero.offsetHeight * 0.2;
// 	updateParallax();
// });
// window.addEventListener('load', updateParallax);