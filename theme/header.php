<?php

/**
 * The header for our theme
 *
 * This is the template that displays the `head` element and everything up
 * until the `#content` element.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package darkjail_acf_tailwind
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>

	<!-- AOS -->
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			var elements = document.querySelectorAll('.aos');

			elements.forEach(function(element) {
				element.setAttribute('data-aos', 'fade-up');
			});

			AOS.init({
				once: true,
				duration: <?php echo $animations_duration ?? 500 ?>,
				disable: function() {
					var maxWidth = 1040;
					return window.innerWidth < maxWidth;
				}
			});
		});


		let scrollRef = 0;

		window.addEventListener('scroll', function() {
			scrollRef++;
			if (scrollRef >= 10) {
				AOS.refresh();
				console.log('AOS refreshed');
				scrollRef = 0;
			}
		});
	</script>
	<!-- End AOS -->
</head>

<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>

	<div id="page">
		<a href="#content" class="sr-only"><?php esc_html_e('Skip to content', 'darkjail-acf-tailwind'); ?></a>

		<?php get_template_part('template-parts/layout/header', 'content'); ?>

		<div id="content" class="pt-[80px] lg:pt-[113px]">