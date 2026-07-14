const DEFAULTS = {
	selector: '.fade-in',
	threshold: 0.15,
	rootMargin: '0px 0px -10% 0px', // элемент считается видимым чуть раньше, чем дойдёт до самого низа экрана
};

export function initFadeIn(options = {}) {
	const { selector, threshold, rootMargin } = { ...DEFAULTS, ...options };

	const elements = document.querySelectorAll(selector);
	if (!elements.length) return;

	// Если браузер совсем древний и IntersectionObserver недоступен —
	// просто показываем всё сразу, без анимации, а не прячем контент навсегда
	if (!('IntersectionObserver' in window)) {
		elements.forEach((el) => el.classList.add('is-visible'));
		return;
	}

	const observer = new IntersectionObserver((entries, obs) => {
		entries.forEach((entry) => {
			if (!entry.isIntersecting) return;

			const el = entry.target;
			const delay = el.dataset.delay ? Number(el.dataset.delay) : 0;

			if (delay > 0) {
				setTimeout(() => el.classList.add('is-visible'), delay);
			} else {
				el.classList.add('is-visible');
			}

			obs.unobserve(el); // анимация один раз за визит — дальше не следим, экономим ресурсы
		});
	}, { threshold, rootMargin });

	elements.forEach((el) => observer.observe(el));
}