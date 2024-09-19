<?php

/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dango_acf_tailwind
 */

?>

<header id="masthead" class="fixed z-20 flex justify-center w-full pt-4 pb-8 bg-white lg:py-8">
	<div class="flex w-full entry-content max-w-content">
		<?php //logo
		$dango_acf_tailwind_logo = get_field('logo', 'option');

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
		<nav id="site-navigation" class="hidden w-full lg:block"
			aria-label="<?php esc_attr_e('Main Navigation', 'dango-acf-tailwind'); ?>">
			<ul class="flex justify-end ">
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
			</ul>
		</nav><!-- #site-navigation -->


		<?php //logo
		$dango_acf_tailwind_logo = get_field('logo', 'option');

		if ($dango_acf_tailwind_logo):
			?>
			<div class="absolute z-10 items-center justify-center lg:hidden left-2">
				<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
					<img src="<?php echo wp_get_attachment_image_url($dango_acf_tailwind_logo, 'medium'); ?>"
						alt="<?php bloginfo('name'); ?>" class="max-h-14 ">
				</a>
			</div>
			<?php
		endif;
		?>
		<nav class="relative flex justify-end lg:hidden mobile-menu">


			<input type="checkbox" id="menu-toggle" class="hidden">
			<label for="menu-toggle" id="mobile-menu-button" class="block h-8 w-8 pt-[9px] mr-4">
				<div class="hamburger-icon">
					<span class="bar"></span>
					<span class="bar"></span>
					<span class="bar"></span>
				</div>

			</label>
			<div id="mobile-menu"
				class="absolute left-0 w-full py-2 mt-0 overflow-hidden transition-all duration-300 ease-in-out bg-white shadow-lg opacity-0 top-16 max-h-0">
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
			$output .= '<ul class="sub-menu">';
			$output .= '<li class="back"><a href="#">< Back</a></li>';
		}
	}

	function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
	{
		// Check if the current item has children (sub-menu)
		$has_children = $args->walker->has_children;

		if ($depth === 0 && $has_children) {
			$output .= '<li class="menu-item menu-item-has-children">';
			$output .= '<a href="' . esc_url($item->url) . '" class="menu-item-link">' . esc_html($item->title) . '</a>';
			$this->current_parent_title = $item->title; // Store the parent item's title
		}

		if ($depth > 0 && $has_children) {
			$output .= '<li class="menu-item menu-item-has-children">';
			$output .= '<a href="' . esc_url($item->url) . '" class="menu-item-link">' . esc_html($item->title) . '</a>';
			$output .= '<a class="menu-item-indicator"> ></a>';
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
