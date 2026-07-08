const STORAGE_KEY = 'welcomeBlockLastShown';
const SHOW_INTERVAL_MS = 60 * 60 * 1000;
const HOLD_DURATION_MS = 4800;

function shouldShowWelcome() {
	try {
		const last = localStorage.getItem(STORAGE_KEY);
		if (!last) return true; // первый визит вообще
		return Date.now() - Number(last) > SHOW_INTERVAL_MS;
	} catch (e) {
		// localStorage недоступен (приватный режим, отключены cookies и т.д.) — показываем на всякий случай
		return true;
	}
}

function markShown() {
	try {
		localStorage.setItem(STORAGE_KEY, String(Date.now()));
	} catch (e) {
		// не критично, если не получилось запомнить — просто будет показываться чаще
	}
}

export function initWelcomeBlock() {
	const block = document.querySelector('.welcome-block');
	if (!block) return; // блок есть в разметке только на главной — на остальных страницах скрипт ничего не делает

	if (!shouldShowWelcome()) {
		block.remove(); // не нужен в этой сессии — сразу убираем, чтобы не мешал (даже невидимый, он в DOM)
		return;
	}

	function showAndScheduleHide() {
		block.classList.add('is-active');
		markShown();

		setTimeout(() => {
			block.classList.add('is-hidden');
		}, HOLD_DURATION_MS);
	}

	document.addEventListener('preloader:hidden', showAndScheduleHide, { once: true });

	// Убираем элемент из DOM окончательно после того, как анимация исчезновения доиграла
	block.addEventListener('animationend', (e) => {
		if (e.target === block && e.animationName === 'hide-welcome') {
			block.remove();
		}
	});
}