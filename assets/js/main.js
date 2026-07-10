// import Header from './Header.js'
// import ExpandableContentCollection from './ExampleClassFile.js'

// new Header()
// new ExpandableContentCollection()
import { showInlineLoader, hideInlineLoader } from './inline-preloader.js';
import { initWelcomeBlock } from './welcome-block.js';
import InputMaskCollection from './InputMask.js';

new InputMaskCollection();
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
/* Код для формы у вёрстке */
document.querySelectorAll('form[data-ajax-form]').forEach((form) => {
	form.addEventListener('submit', async (e) => {
		e.preventDefault();

		const button = form.querySelector('button[type="submit"], input[type="submit"]');
		const statusEl = form.querySelector('.form__status');
		const parentDialog = form.closest('dialog');

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

			switchModal(parentDialog, form.dataset.successModal);

		} catch (error) {
			console.error('Ошибка отправки формы:', error);
			if (statusEl) statusEl.textContent = 'Не удалось отправить форму. Попробуйте ещё раз.';

			switchModal(parentDialog, form.dataset.errorModal);
		} finally {
			hideInlineLoader(button);
			button.disabled = false;
		}
	});
});

document.querySelectorAll('[data-open-modal]').forEach((trigger) => {
	trigger.addEventListener('click', () => {
		const modal = document.getElementById(trigger.dataset.openModal);
		if (modal) modal.showModal();
	});
});

function switchModal(currentDialog, targetModalId) {
	if (currentDialog) currentDialog.close();

	if (!targetModalId) return;

	const targetDialog = document.getElementById(targetModalId);
	if (targetDialog) targetDialog.showModal();
}

function fakeSubmitRequest(form) {
	return new Promise((resolve) => {
		setTimeout(() => resolve({ ok: true }), 8000);
	});
}
/* Код для формы с плагином CF-7 */
// document.addEventListener('wpcf7beforesubmit', (e) => {
//   const form = e.target; // сама форма, на которой сработало событие
//   const button = form.querySelector('button[type="submit"], input[type="submit"]');
//   if (!button) return;

//   button.disabled = true;
//   showInlineLoader(button);
// });

// document.addEventListener('wpcf7mailsent', (e) => {
//   const form = e.target;
//   const parentDialog = form.closest('dialog');

//   switchModal(parentDialog, form.dataset.successModal);
// });

// document.addEventListener('wpcf7invalid', (e) => {
//   const form = e.target;
//   finishSubmit(form);
//   // Специально НЕ открываем error-модалку тут — это не ошибка сервера,
//   // а просто невалидные поля, CF7 сам покажет подсказки под нужными инпутами
// });

// document.addEventListener('wpcf7mailfailed', (e) => {
//   const form = e.target;
//   const parentDialog = form.closest('dialog');

//   finishSubmit(form);
//   switchModal(parentDialog, form.dataset.errorModal);
// });

// document.addEventListener('wpcf7spam', (e) => {
//   const form = e.target;
//   finishSubmit(form);
// });

// function finishSubmit(form) {
//   const button = form.querySelector('button[type="submit"], input[type="submit"]');
//   if (!button) return;

//   hideInlineLoader(button);
//   button.disabled = false;
// }

// function switchModal(currentDialog, targetModalId) {
//   if (currentDialog) currentDialog.close();
//   if (!targetModalId) return;

//   const targetDialog = document.getElementById(targetModalId);
//   if (targetDialog) targetDialog.showModal();
// }