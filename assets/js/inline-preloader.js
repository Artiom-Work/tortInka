const PRELOADER_TEMPLATE = `
		<div class="loader loader--sm" data-inline-loader>
			<img class="loader__art" src="./assets/images/preloader/logo-tortInka-dark-pink.svg" width="250" height="197"
				alt="">

			<svg class="loader__trace-svg loader__trace-svg--sm" viewBox="0 0 259 233" aria-hidden="true">
				<path class="loader__trace loader__trace--halo"
					d="M244.569 27.9018C278.632 94.7141 126.186 204.5 125.351 204.5C124.515 204.5 -23.9806 112.188 3.35934 35.7863C30.6992 -40.6154 122.713 35.2501 122.22 35.2508C121.728 35.2515 210.507 -38.9105 244.569 27.9018Z"
					pathLength="1" fill="none" stroke="#fff"></path>

				<path class="loader__trace loader__trace--core"
					d="M244.569 27.9018C278.632 94.7141 126.186 204.5 125.351 204.5C124.515 204.5 -23.9806 112.188 3.35934 35.7863C30.6992 -40.6154 122.713 35.2501 122.22 35.2508C121.728 35.2515 210.507 -38.9105 244.569 27.9018Z"
					pathLength="1" fill="none" stroke="#fff"></path>
			</svg>

			<div class="loader__sheen"></div>
		</div>
`;

/**
 * Показать маленький лоадер внутри контейнера.
 * @param {HTMLElement} container — должен иметь position: relative (класс .preloader-block уже это даёт)
 */
export function showInlineLoader(container, timeoutMs = 20000) {
	if (!container || container.querySelector('[data-inline-loader]')) return;

	const computedPosition = getComputedStyle(container).position;
	if (computedPosition === 'static') {
		container.style.position = 'relative';
		container.dataset.loaderForcedPosition = 'true';
	}

	container.insertAdjacentHTML('beforeend', PRELOADER_TEMPLATE);
	container.setAttribute('aria-busy', 'true');

	// Страховка: если по любой причине hideInlineLoader не будет вызван вручную —
	// лоадер уберётся сам через timeoutMs
	const timeoutId = setTimeout(() => hideInlineLoader(container), timeoutMs);
	container.dataset.loaderTimeoutId = String(timeoutId);
}

export function hideInlineLoader(container) {
	if (!container) return;

	const loader = container.querySelector('[data-inline-loader]');
	if (loader) loader.remove();

	container.removeAttribute('aria-busy');

	if (container.dataset.loaderForcedPosition) {
		container.style.position = '';
		delete container.dataset.loaderForcedPosition;
	}

	// Отменяем страховочный таймер, раз лоадер убрали "штатно" —
	// иначе через 20 сек он попробует убрать уже несуществующий лоадер (не страшно, но незачем)
	if (container.dataset.loaderTimeoutId) {
		clearTimeout(Number(container.dataset.loaderTimeoutId));
		delete container.dataset.loaderTimeoutId;
	}
}