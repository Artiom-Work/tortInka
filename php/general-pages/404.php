<?php get_header(); ?>

	<main>
		<section class="error-block" aria-labelledby="error-block-title">
			<h1 class="visually-hidden">Страница 404 на сайте tortInka</h1>

			<div>
				<h2 class="error-block__title h1" id="error-block-title">
					<?php the_field('error_page_title' , get_settings_page_id()); ?>
				</h2>

				<div class="error-block__text">
					<p>
						<?php the_field('error_page_text' , get_settings_page_id()); ?>
					</p>
				</div>

				<a class="button" href="<?php echo esc_url( home_url() ); ?>">
					Домой
				</a>
			</div>

			<figure class="confirm-submit__image-wrapper image-slot preloader-block">
				<img class="confirm-submit__image" src="<?php echo esc_url( get_field('error_page_image' , get_settings_page_id()) ); ?>" width="450" height="400"
					alt="Прошу прощения" loading="lazy">
			</figure>
		</section>
	</main>
<?php get_footer(); ?>
