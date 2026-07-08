// functions.php
<?php
/* В самом самом начале добавить класс с отключение скролла */
add_action('wp_head', 'tortinka_lock_scroll_early', 0); 

function tortinka_lock_scroll_early() {
    ?>
    <script>document.documentElement.classList.add('is-loading');</script>
    <?php
}

/* Стили для прелоудера должны быть первыми */
add_action('wp_head', 'tortinka_preloader_critical_css', 1);

function tortinka_preloader_critical_css() {
    ?>
    <style id="preloader-critical-css">
			/* ===  Preloader styles === */
			html.is-loading,
			html.is-loading body {
				overflow: hidden;
				height: 100%;
			}
			.preloader {
				display: flex;
				align-items: center;
				justify-content: center;
				position: absolute;
				z-index: 10;
				width: 100%;
				height: 100vh;
				background-color: #0e0c0c;
				opacity: 1;
				transition-duration: 1s;
			}
			.preloader.is-hidden {
				animation: hide-preloader 1.5s ease-out;
			}
			.preloader__backdrop {
				position: absolute;
				overflow: hidden;
				width: 100%;
				height: 100%;
				left: 50%;
				top: 50%;
				translate: -50% -50%;
				border-radius: 50%;
				background: radial-gradient(circle, rgba(116, 6, 47, 0.75) 0%, rgba(116, 6, 47, 0.01) 30%, transparent 100%);
				filter: blur(30px);
				pointer-events: none;
			}

			.preloader-block {
				position: relative;
				display: inline-block;
			}
			.preloader-block[aria-busy=true] span {
				visibility: hidden;
			}

			.preloader-block--xs .loader--sm {
				width: 2.375rem;
				height: 1.875rem;
			}

			.preloader-block--xs .loader__trace-svg--sm {
				top: -0.125rem;
			}
			
			.loader {
				position: relative;
				display: inline-flex;
			}

			.loader--full {
				background-color: transparent;
				width: 16.25rem;
				height: 14.5625rem;
			}

			.loader--sm {
				width: 3.5rem;
				height: 3.125rem;
				position: absolute;
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
			}

			.loader__art {
				position: absolute;
				inset: 0;
				width: 100%;
				height: 100%;
				object-fit: contain;
			}

			.loader__trace {
				fill: none;
				stroke-linecap: round;
				stroke-dasharray: 0.0001 1;
				stroke-dashoffset: 1;
				animation: loader-trace 2.6s cubic-bezier(0.22, 1, 0.36, 1) infinite;
			}

			.loader__trace-svg {
				position: absolute;
				top: -1.25rem;
				left: 0.25rem;
				right: -0.25rem;
				bottom: 0;
				width: 100%;
				height: 130%;
				overflow: visible;
				pointer-events: none;
			}

			.loader__trace-svg--sm {
				top: -0.3125rem;
				left: 0;
			}

			.loader__trace--halo {
				stroke-width: 30;
				filter: blur(0.4375rem);
				opacity: 0.5;
			}

			.loader__trace--core {
				stroke-width: 6;
				filter: blur(0.0625rem) drop-shadow(0 0 0.375rem rgba(255, 255, 255, 0.9));
				opacity: 1;
			}

			.loader__sheen {
				position: absolute;
				inset: 0;
				pointer-events: none;
				mix-blend-mode: overlay;
				mask-image: url("../../images/preloader/logo-tortInka-dark-pink.svg");
				mask-repeat: no-repeat;
				mask-position: center;
				mask-size: contain;
				-webkit-mask-image: url("../../images/preloader/logo-tortInka-dark-pink.svg");
				-webkit-mask-repeat: no-repeat;
				-webkit-mask-position: center;
				-webkit-mask-size: contain;
				background: linear-gradient(90deg, transparent 0%, rgba(255, 255, 255, 0.9) 50%, transparent 100%);
				background-size: 40% 100%;
				background-repeat: no-repeat;
				background-position: -40% 0;
				animation: loader-sheen 2.8s ease-in infinite;
			}

			@keyframes loader-trace {
							0% {
								stroke-dashoffset: 1;
								opacity: 0.5;
							}
							15% {
								opacity: 1;
							}
							35% {
								opacity: 0.5;
							}
							60% {
								opacity: 1;
							}
							85% {
								opacity: 0.6;
							}
							100% {
								stroke-dashoffset: 0;
								opacity: 1;
							}
						}

			@keyframes loader-sheen {
							0% {
								background-position: -40% 0;
							}
							22% {
								background-position: 140% 0;
							}
							100% {
								background-position: 140% 0;
							}
			}
			@keyframes hide-preloader {
				0% {
					opacity: 1;
				}

				99% {
					opacity: 0;
				}

				100% {
					display: none;
				}
			}
			@media (prefers-reduced-motion: reduce) {
							.loader__trace,
							.loader__halo,
							.loader__core,
							.loader__sheen {
								animation: none;
						}
			}
    </style>
    <?php
}

/* Разметка для прелоудера вначале body */
add_action('wp_body_open', 'tortinka_render_preloader', 5);

function tortinka_render_preloader() {
    $logo = get_theme_mod('preloader_logo', get_template_directory_uri() . '/assets/images/preloader/logo-tortInka-dark-pink.svg');
    ?>
    <div class="preloader" data-preloader>
        <div class="preloader__backdrop"></div>

        <div class="loader loader--full">
            <img class="loader__art" src="<?php echo esc_url($logo); ?>" width="250" height="197" alt="" aria-hidden="true">

            <svg class="loader__trace-svg" viewBox="0 0 259 233" aria-hidden="true">
                <path class="loader__trace loader__trace--halo"
                    d="M244.569 27.9018C278.632 94.7141 126.186 204.5 125.351 204.5C124.515 204.5 -23.9806 112.188 3.35934 35.7863C30.6992 -40.6154 122.713 35.2501 122.22 35.2508C121.728 35.2515 210.507 -38.9105 244.569 27.9018Z"
                    pathLength="1" fill="none" stroke="#fff"></path>
                <path class="loader__trace loader__trace--core"
                    d="M244.569 27.9018C278.632 94.7141 126.186 204.5 125.351 204.5C124.515 204.5 -23.9806 112.188 3.35934 35.7863C30.6992 -40.6154 122.713 35.2501 122.22 35.2508C121.728 35.2515 210.507 -38.9105 244.569 27.9018Z"
                    pathLength="1" fill="none" stroke="#fff"></path>
            </svg>

            <div class="loader__sheen"></div>
        </div>
    </div>
    <?php
}

/* Скрипт закрывающий прелоудер при полной прогрузке дом дерева */
add_action('wp_footer', 'tortinka_preloader_hide_script', 5);

function tortinka_preloader_hide_script() {
    ?>
		<script>
		document.addEventListener('DOMContentLoaded', function () {
				var preloader = document.querySelector('[data-preloader]');
				if (!preloader) {
            // Прелоудера нет на странице — сразу сообщаем остальным скриптам,
            // что "загрузка завершена", чтобы welcome-блок не ждал вечно
            document.dispatchEvent(new CustomEvent('preloader:hidden'));
            return;
        }

				function hide() {
						preloader.classList.add('is-hidden');
						document.documentElement.classList.remove('is-loading');
						document.dispatchEvent(new CustomEvent('preloader:hidden'));
						setTimeout(function () {
								preloader.remove();
						}, 400);
				}

				window.addEventListener('load', hide);
				setTimeout(hide, 8000);
		});
		</script>
    <?php
}
?>

<!--
 1. Правильный хук для разметки — wp_body_open, а не что-то "самое раннее"
Дело не в том, чтобы искать хук "раньше всех" — а в том, чтобы использовать правильный по назначению хук. С WordPress 5.2 специально под эту задачу существует wp_body_open — он вызывается ровно сразу после открывающего тега <body>, до вообще любой другой разметки темы (шапки, меню, контента). -->

<!-- Важное условие: это сработает, только если header.php темы реально содержит вызов wp_body_open(); сразу после <body ...>. Все современные темы на _s/underscores его уже имеют, но если пишете тему с нуля — проверь сам файл:

	<body <?php body_class(); ?>>
<?php wp_body_open(); ?>	

Если этого вызова нет — хук wp_body_open вообще никогда не сработает, сколько ни вешай на него функций. Это первое, что нужно проверить.
Про приоритет 5 — я поставил его пониже стандартного 10 специально: некоторые плагины (Google Tag Manager, аналитика) тоже вешают свой вывод (например, <noscript> с iframe) на этот же хук. Приоритет 5 гарантирует, что твоя разметка выведется раньше их вставок — прелоудер физически будет первым пикселем страницы.
-->

<!-- 
2. Критический CSS — инлайн в <head>, не через enqueue
Обычный wp_enqueue_style() подключает файл асинхронно относительно рендеринга и может подгрузиться позже, чем нужно (особенно если файл большой или объединён со всей остальной стилевой таблицей темы). Чтобы прелоудер точно не "мигнул" без стилей, его CSS нужно вставить прямо тегом <style> в <head>, максимально рано:
Приоритет 1 у wp_head — чтобы этот <style> оказался в <head> раньше, чем WordPress начнёт выводить остальные стили/скрипты через свою обычную очередь.
Дальше основной SCSS-файл темы (с уже готовыми стилями .loader, .loader__trace и т.д. — тем самым, что мы писали весь этот диалог) продолжает грузиться как обычно через wp_enqueue_style(). Дублирование правил прелоудера в двух местах (инлайн критический CSS + основной файл) — это осознанный компромисс: инлайн-копия нужна только для первого мгновенного рендера, а полноценный файл продолжает управлять всем остальным сайтом.
-->
<!-- 
3. JS для скрытия — тоже инлайн, с фолбэком по таймауту
	Почему window.addEventListener('load'), а не DOMContentLoaded: load срабатывает, когда полностью догрузились вообще все ресурсы (картинки, шрифты, iframe) — именно то состояние, когда сайт реально готов показаться пользователю без "прыжков" контента. DOMContentLoaded сработает раньше — ещё до подгрузки картинок, и прелоудер спрячется преждевременно.
Таймаут-фолбэк на 8 секунд — обязательная деталь именно под сценарий "плохой интернет/связь с сервером": если что-то подвиснет (например, медленный сторонний скрипт аналитики блокирует load), пользователь не должен видеть вечный прелоудер — таймаут принудительно его уберёт, даже если событие load так и не пришло.
Про "переходы между страницами"
Если сайт — обычный многостраничный WordPress (не SPA с AJAX-навигацией через history.pushState), то каждый переход между страницами — это полная перезагрузка документа браузером. В этом случае ничего специально настраивать для "переходов" не нужно: wp_body_open отработает заново на каждой странице сама собой, прелоудер будет появляться на каждом переходе автоматически — это встроенное поведение обычной браузерной навигации, а не что-то, что нужно программировать отдельно.
Если же в проекте позже появится AJAX-навигация (Barba.js, вручную написанный роутинг через fetch) — это отдельная и существенно более сложная задача (нужно управлять появлением/скрытием прелоудера вручную при каждом AJAX-переходе, кэшировать состояние и т.д.), дай знать, если это актуально — разберём отдельно, в этот ответ такое не заложено.

PS. Cloud
-->