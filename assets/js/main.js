// import Header from './Header.js'
// import ExpandableContentCollection from './ExampleClassFile.js'

// new Header()
// new ExpandableContentCollection()
import { showInlineLoader, hideInlineLoader } from './inline-preloader.js';
import { initWelcomeBlock } from './welcome-block.js';

initWelcomeBlock();
document.querySelectorAll('.image-slot').forEach((slot) => {
	const img = slot.querySelector('img');
	if (!img) return;

	if (img.complete && img.naturalWidth > 0) return;

	showInlineLoader(slot);

	const finish = () => hideInlineLoader(slot);
	img.addEventListener('load', finish);
	img.addEventListener('error', finish);
});

document.querySelectorAll('form[data-ajax-form]').forEach((form) => {
	form.addEventListener('submit', async (e) => {
		e.preventDefault();

		const button = form.querySelector('button[type="submit"]');
		const statusEl = form.querySelector('.form__status');

		if (!button) return;

		button.disabled = true;
		showInlineLoader(button);
		if (statusEl) statusEl.textContent = '';

		try {
			const response = await fakeSubmitRequest(form);// ← временная имитация, см. ниже

			if (!response.ok) {
				throw new Error(`Сервер вернул ошибку: ${response.status}`);
			}

			if (statusEl) statusEl.textContent = 'Спасибо! Заявка отправлена.';
			form.reset();

		} catch (error) {
			console.error('Ошибка отправки формы:', error);
			if (statusEl) statusEl.textContent = 'Не удалось отправить форму. Попробуйте ещё раз.';

		} finally {
			hideInlineLoader(button);
			button.disabled = false;
		}
	});
});

function fakeSubmitRequest(form) {
	return new Promise((resolve) => {
		setTimeout(() => resolve({ ok: true }), 8000);
	});
}

