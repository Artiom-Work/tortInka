
	<footer class="footer fade-in">
		<div class="parallax-bg parallax-bg--main"
			style="background: url('<?php echo get_template_directory_uri(); ?>/assets/images/footer/footer-bg.webp') no-repeat top center / cover;">
		</div>

		<div class="parallax-bg parallax-bg--secondary"
			style="background: url('<?php echo get_template_directory_uri(); ?>/assets/images/footer/footer-bg-2.webp') no-repeat top center / cover;">
		</div>

		<div class="container">
			<a class="footer__logo logo fade-in" data-delay="200" href="/../">
				<img class="logo__image" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-big-red.svg" width="127" height="100" alt="Логотип tortInka">
			</a>

			<div class="footer__slogan h3 fade-in" data-delay="300">
				<p>
					Здесь всё сделано вручную, с&nbsp;теплом и&nbsp;заботой о&nbsp;вас!
				</p>
			</div>

			<ul class="footer__connect-list">
				<li class="contacts-link fade-in" data-delay="200">
					<a href="#!" target="_blank" rel="noopener noreferrer">
						<svg width="44" height="44">
							<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/sprite-icons.svg#location-point">
							</use>
						</svg>

						<address>
							Республика Беларусь, город Гомель
						</address>
					</a>
				</li>

				<li class="contacts-link contacts-link--phone fade-in" data-delay="400">
					<a href="tel:+375299999999">
						<svg width="44" height="44">
							<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/sprite-icons.svg#phone-icon">
							</use>
						</svg>

						<span>+375 (29) 999-99-99</span>
					</a>
				</li>

				<li class="contacts-link fade-in" data-delay="600">
					<svg width="44" height="44">
						<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/sprite-icons.svg#work-time">
						</use>
					</svg>

					<p>
						Принимаю заказы с&nbsp;<time datetime="09:00">9:00</time>&nbsp;до&nbsp;<time datetime="21:00">21:00</time>
					</p>
				</li>
			</ul>

			<div class="contacts-link contacts-link--document fade-in" data-delay="600">
				<a href="<?php echo get_template_directory_uri(); ?>/assets/images/certificates/certificate-1.webp" target="_blank">
					<svg width="44" height="44">
						<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/sprite-icons.svg#document">
						</use>
					</svg>

					<span>Сертификат кондитера</span>
				</a>
			</div>


			<div class="footer__copyright">
				<p>
					© 2026, 𝓘𝓷𝓷𝓪 𝓒𝓱𝓪𝓹𝓵𝓲𝓷𝓪. <span class="accent-font third-accent-color words-no-wrap">Сделано с
						любовью...</span>
				</p>
			</div>

		</div>
	</footer>

	<svg width="0" height="0" style="position:absolute" aria-hidden="true" focusable="false">
		<defs>
			<linearGradient id="logo-sheen-gradient" x1="0" y1="0" x2="1" y2="0">
				<stop offset="0" stop-color="#fff" stop-opacity="0" />
				<stop offset="0.5" stop-color="#fff" stop-opacity="0.9" />
				<stop offset="1" stop-color="#fff" stop-opacity="0" />
			</linearGradient>

			<linearGradient id="logo-trace-gradient" x1="0" y1="0" x2="0" y2="1">
				<stop offset="0" stop-color="#fff" stop-opacity="0" />
				<stop offset="0.5" stop-color="#fff" stop-opacity="1" />
				<stop offset="1" stop-color="#fff" stop-opacity="0" />
			</linearGradient>
		</defs>
	</svg>

	<dialog class="base-modal" id="succSubmitModal">
		<form class="base-modal__close-overlay-wrapper" method="dialog">
			<button class="base-modal__close-overlay" type="submit">
				<span class="visually-hidden">Область закрытия модального окна уведомления об успешной отправке заказа на сайте
					tortInka</span>
			</button>
		</form>

		<div class="base-modal__inner">
			<section class="base-modal__content confirm-submit" aria-labelledby="succ-submit-title">
				<h3 class="visually-hidden">Успешная отправка заказа на сайте tortInka</h3>

				<div>
					<h4 class="confirm-submit__title h1" id="succ-submit-title">
						Ваша заявка<br>
						успешно отправлена!
					</h4>

					<div class="confirm-submit__text">
						<p>
							Я свяжусь с&nbsp;вами в&nbsp;ближайшее время
						</p>
					</div>

					<a class="button" href="/../">
						Домой
					</a>
				</div>

				<figure class="confirm-submit__image-wrapper image-slot preloader-block">
					<img class="confirm-submit__image" src="<?php echo get_template_directory_uri(); ?>/assets/images/modals/thank-you.webp" width="450" height="400"
						alt="Спасибо за ваш заказ" loading="lazy">
				</figure>
			</section>
		</div>
	</dialog>

	<dialog class="base-modal" id="errorSubmitModal">
		<form class="base-modal__close-overlay-wrapper" method="dialog">
			<button class="base-modal__close-overlay" type="submit">
				<span class="visually-hidden">Область закрытия модального окна уведомления об успешной отправке заказа на сайте
					tortInka</span>
			</button>
		</form>

		<div class="base-modal__inner">
			<section class="base-modal__content confirm-submit" aria-labelledby="confirm-submit-title">
				<h3 class="visually-hidden">Сообщение пользователю об ошибке отправки данных на сайте tortInka</h3>

				<div>
					<h4 class="confirm-submit__title confirm-submit__title--fail h1" id="confirm-submit-title">
						Что-то пошло не&nbsp;так&nbsp;.<br>
						Извините&nbsp;...
					</h4>

					<div class="confirm-submit__text">
						<p>
							Попробуйте ещё раз...
						</p>
					</div>

					<a class="button" href="/../">
						Домой
					</a>
				</div>

				<figure class="confirm-submit__image-wrapper image-slot preloader-block">
					<img class="confirm-submit__image" src="<?php echo get_template_directory_uri(); ?>/assets/images/modals/sorry-image.webp" width="450" height="400"
						alt="Извините, что-то пошло не так" loading="lazy">
				</figure>
			</section>
		</div>
	</dialog>

	<dialog class="base-modal" id="callBackModal">
		<form class="base-modal__close-overlay-wrapper" method="dialog">
			<button class="base-modal__close-overlay" type="submit">
				<span class="visually-hidden">Область закрытия модального окна для заказа на сайте tortInka</span>
			</button>
		</form>

		<div class="base-modal__inner">
			<section class="base-modal__content callback-order">
				<form class="base-modal__close-button-wrapper" method="dialog">
					<button class="base-modal__close-button" type="submit">
						<span class="visually-hidden">
							Кнопка для закрывания заявки на обратный звонок
						</span>

						<svg class="base-modal__close-button-icon" width="44" height="44">
							<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/sprite-icons.svg#close-circle-icon">
							</use>
						</svg>
					</button>
				</form>
				<h3 class="visually-hidden">Заказ кондитерского изделия на сайте tortInka</h3>

				<div class="callback-order__image-wrapper image-slot preloader-block">
					<img class="callback-order__image" src="<?php echo get_template_directory_uri(); ?>/assets/images/modals/callback-form-bg.webp" width="550" height="750"
						alt="" aria-hidden="true">
				</div>

				<div class="callback-order__action">
					<?php echo do_shortcode('[contact-form-7 id="3706107" title="Форма обратной связи в модальном окне" html_class="callback-order__form custom-form"]'); ?>
				</div>
			</section>
		</div>
	</dialog>

<?php wp_footer(); ?>

</body>

</html>