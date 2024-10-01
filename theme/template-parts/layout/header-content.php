<?php

/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dango_acf_tailwind
 */

$header_settings = get_field('header_footer', 'option');
$dango_acf_tailwind_logo = $header_settings['site_logo'];
$background_image_mobile = $header_settings['mobile_nav_background'];

// echo '<pre>';
// print_r($background_image_mobile);
// echo '</pre>';

?>

<style>
	#mobile-menu {
		background-image: url(<?= $background_image_mobile['url']; ?>);
		background-size: cover;
		background-position: center;
	}
</style>

<header id="masthead" class="fixed z-20 flex justify-center w-full pt-4 pb-8 bg-ice lg:py-8">
	<div class="relative flex w-full gap-2 c-container">
		<?php //logo

		if ($dango_acf_tailwind_logo): ?>
			<div class="items-center justify-center hidden lg:flex">
				<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
					<img src="<?php echo wp_get_attachment_image_url($dango_acf_tailwind_logo, 'medium'); ?>"
						alt="<?php bloginfo('name'); ?>" class="max-h-14 ">
				</a>
			</div>
			<?php
		endif;
		?>
		<nav id="site-navigation" class="items-center justify-end hidden w-full gap-2 lg:flex"
			aria-label="<?php esc_attr_e('Main Navigation', 'dango-acf-tailwind'); ?>">
			<div class="flex w-[-webkit-fill-available] justify-center h-full items-center">
				<?php
				if (has_nav_menu('menu-1')) {
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1', // Replace with your menu location
							'container' => false,    // Remove the menu container
							'menu_class' => 'main-nav', // Add your custom CSS classes here
							'walker' => new Custom_Walker_Nav_Menu(),
						)
					);
				}
				?>
			</div>
			<!--  -->
			<div class="flex items-center gap-2">
				<?php
				get_template_part('template-parts/components/button', '', array(
					'type' => 'secondary',
					'size' => 'medium',
					'button' => [
						'text' => 'Login',
						'url' => [
							'url' => 'https://one.pixability.com/login',
							'target' => '_self',
						],
					],
				));
				get_template_part('template-parts/components/button', '', array(
					'type' => 'primary',
					'size' => 'medium',
					'button' => [
						'text' => 'Contact Us',
						'url' => [
							'url' => '/get-in-touch',
							'target' => '_self',
						],
					],
				))
					?>
			</div>
		</nav><!-- #site-navigation -->


		<?php //logo

		if ($dango_acf_tailwind_logo):
			?>
			<div class="lg:hidden">
				<a href="<?= esc_url(home_url('/')); ?>" rel="home">
					<img src="<?= wp_get_attachment_image_url($dango_acf_tailwind_logo, 'medium'); ?>"
						alt="<?php bloginfo('name'); ?>" class="max-h-14 ">
				</a>
			</div>
			<?php
		endif;
		?>
		<nav class="flex justify-end lg:hidden mobile-menu">
			<input type="checkbox" id="menu-toggle" class="hidden">
			<label for="menu-toggle" id="mobile-menu-button" class="block h-8 w-8 pt-[9px] mr-4">
				<div class="hamburger-icon">
					<span class="bar"></span>
					<span class="bar"></span>
					<span class="bar"></span>
				</div>

			</label>
			<div id="mobile-menu"
				class="absolute w-[100dvw] py-24 px-4 mt-0 overflow-hidden transition-all duration-300 ease-in-out bg-white shadow-lg opacity-0 left-0 top-16 max-h-0">
				<?php
				// Use wp_nav_menu() or create a custom menu here
				if (has_nav_menu('menu-1')) {
					wp_nav_menu(array(
						'theme_location' => 'menu-1', // Replace with your menu location
						'container' => false,    // Remove the menu container
						'menu_class' => 'main-nav-mobile', // Add your custom CSS classes here
						'walker' => new Custom_Walker_Nav_Menu(),

					));
				}
				?>
				<div class="flex flex-col items-center gap-[42px] mt-[42px]">
					<?php
					get_template_part('template-parts/components/button', '', array(
						'type' => 'secondary',
						'size' => 'medium',
						'button' => [
							'text' => 'Login',
							'url' => [
								'url' => 'https://one.pixability.com/login',
								'target' => '_self',
							],
						],
					));
					get_template_part('template-parts/components/button', '', array(
						'type' => 'primary',
						'size' => 'medium',
						'button' => [
							'text' => 'Contact Us',
							'url' => [
								'url' => '/get-in-touch',
								'target' => '_self',
							],
						],
					))
						?>
				</div>
			</div>
		</nav>

	</div>
</header><!-- #masthead -->

<?php
class Custom_Walker_Nav_Menu extends Walker_Nav_Menu
{
	function start_lvl(&$output, $depth = 0, $args = null)
	{
		// Check if the current item has children (sub-menu)
		if ($args->walker->has_children) {
			$output .= '<ul class="sub-menu ' . ($depth >= 1 ? 'child' : '') . '">';
		}
	}

	function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
	{
		// Check if the current item has children (sub-menu)
		$has_children = $args->walker->has_children;

		if ($depth === 0 && $has_children) {
			$output .= '<li class="flex flex-row flex-wrap items-center justify-center gap-x-2 lg:flex-nowrap menu-item menu-item-has-children">';
			$output .= '<a href="' . esc_url($item->url) . '" class="menu-item-link">' . esc_html($item->title) . '</a>';

			$output .= '<svg class="lg:hidden" width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.5 7.00001L1.5 4.37114e-08L0.5 0.999797L6.5 7.00001L0.499999 13.0002L1.5 14L8.5 7.00001Z" fill="black"/></svg>';
			$output .= '<svg class="hidden transition-all lg:block" width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg"><mask id="path-1-inside-1_5001_19" fill="white"><path d="M5.00017 5.33333L0.333496 0.666666L1.00003 0L5.00017 4L9.0003 0L9.66683 0.666666L5.00017 5.33333Z"/></mask><path d="M5.00017 5.33333L0.333496 0.666666L1.00003 0L5.00017 4L9.0003 0L9.66683 0.666666L5.00017 5.33333Z" fill="black"/><path d="M5.00017 5.33333L4.29306 6.04044L5.00017 6.74755L5.70727 6.04044L5.00017 5.33333ZM0.333496 0.666666L-0.373682 -0.0403686L-1.08065 0.666739L-0.37361 1.37377L0.333496 0.666666ZM1.00003 0L1.70712 -0.707119L0.999943 -1.41427L0.292849 -0.707035L1.00003 0ZM5.00017 4L4.29307 4.70712L5.00017 5.41419L5.70726 4.70712L5.00017 4ZM9.0003 0L9.70748 -0.707035L9.00038 -1.41427L8.2932 -0.707118L9.0003 0ZM9.66683 0.666666L10.3739 1.37377L11.081 0.666737L10.374 -0.040369L9.66683 0.666666ZM5.70727 4.62623L1.0406 -0.0404407L-0.37361 1.37377L4.29306 6.04044L5.70727 4.62623ZM1.04067 1.3737L1.70721 0.707035L0.292849 -0.707035L-0.373682 -0.0403686L1.04067 1.3737ZM0.292933 0.707119L4.29307 4.70712L5.70726 3.29288L1.70712 -0.707119L0.292933 0.707119ZM5.70726 4.70712L9.70739 0.707118L8.2932 -0.707118L4.29307 3.29288L5.70726 4.70712ZM8.29312 0.707035L8.95965 1.3737L10.374 -0.040369L9.70748 -0.707035L8.29312 0.707035ZM8.95972 -0.0404401L4.29306 4.62623L5.70727 6.04044L10.3739 1.37377L8.95972 -0.0404401Z" fill="#221F20" mask="url(#path-1-inside-1_5001_19)"/></svg>';

			$this->current_parent_title = $item->title; // Store the parent item's title
		}

		if ($depth > 0 && $has_children) {
			$output .= '<li class="menu-item menu-item-has-children">';
			$output .= '<a href="' . esc_url($item->url) . '" class="menu-item-link">' . esc_html($item->title) . '</a>';
			// $output .= '<a class="menu-item-indicator"> ></a>';
		}

		if (!$has_children) {
			$output .= '<li class="menu-item">';
			$output .= '<a href="' . esc_url($item->url) . '" class="menu-item-link">' . esc_html($item->title) . '</a>';
		}
	}

	function end_el(&$output, $item, $depth = 0, $args = null)
	{
		$output .= '</li>';
	}
}

?>
