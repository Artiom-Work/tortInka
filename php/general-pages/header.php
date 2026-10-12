<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" type="image/svg+xml" href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/favicon.svg">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	<header class="header">
		<div class="container">
			<a class="header__logo logo" href="/../">
				<img class="logo__image" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" width="95" height="75" alt="Логотип tirtInka">
			</a>

			<nav class="header__nav nav hidden-mobile">
				<ul class="nav__list">
					<li>
						<a href="/../">Домой</a>
					</li>

					<li>
						<a href="<?php echo get_template_directory_uri(); ?>/shop/">Музей вкусов</a>
					</li>

					<li>
						<a href="#!">Контакты</a>
					</li>

					<li>
						<a href="#!">Обо мне</a>
					</li>
				</ul>
			</nav>

			<div class="mobile-menu visible-mobile">
				<input id="menu-switch" type="checkbox">
				<label class="mobile-menu__burger" for="menu-switch">
					<svg class="mobile-menu__burger-open" width="36" height="36">
						<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/sprite-icons.svg#cake-button">
						</use>
					</svg>

					<svg class="mobile-menu__burger-close" width="44" height="44">
						<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/sprite-icons.svg#close-circle-icon">
						</use>
					</svg>
				</label>

				<div class="mobile-menu__wrapper">
					<nav class="mobile-menu__box"
						style="background:linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url(<?php echo get_template_directory_uri(); ?>/assets/images/slogan/maid-with-love-text-rotate.webp) no-repeat right bottom / 250px 300px;">
						<ul class="nav__list">
							<li>
								<a href="/../">Домой</a>
							</li>

							<li>
								<a href="<?php echo get_template_directory_uri(); ?>/shop/">Музей вкусов</a>
							</li>

							<li>
								<a href="#!">Контакты</a>
							</li>

							<li>
								<a href="#!">Обо мне</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>

			<ul class="header__soc1als visible-mobile">
				<li>
					<a href="#!" aria-label="social-icon" target="_blank">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/viber-icon.svg" width="36" height="36" alt="" aria-hidden="true">
					</a>
				</li>

				<li>
					<a href="#!" aria-label="social-icon" target="_blank">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/inst-icon.svg" width="36" height="36" alt="" aria-hidden="true">
					</a>
				</li>

				<li>
					<a href="#!" aria-label="social-icon" target="_blank">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/telegram-icon.svg" width="36" height="36" alt="" aria-hidden="true">
					</a>
				</li>
			</ul>
		</div>
	</header>