<?php

/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dango_acf_tailwind
 */

$footer_settings = get_field('header_footer', 'option');
$footer_logo = $footer_settings['footer_logo'];
$footer_background = $footer_settings['footer_image'];
$footer_background__mobile = $footer_settings['footer_image__mobile'];
$social_links = $footer_settings['social_links'] ?: array();
$disclaimer = $footer_settings['footer_disclaimer'];

// get_template_part('template-parts/layout/newsletter', 'content');

?>

<style>
	#colophon .bg-image {
		background-image: url('<?= $footer_background__mobile['url']; ?>');
		background-size: cover;
		background-position: center bottom 25%;
	}

	@media (width >=768px) {
		#colophon .bg-image {
			background-image: url('<?= $footer_background['url']; ?>');
			background-position: right top;
		}
	}
</style>

<footer id="colophon" class="flex flex-col gap-8 py-8 text-black bg-ice">
	<div class="w-full c-container">
		<div
			class="flex flex-col items-start justify-between w-full gap-12 lg:gap-[90px] p-4 bg-image md:flex-row md:p-12 rounded-[14px]">
			<picture class="md:flex-[1_0_165px] h-fit w-fit max-w-[165px]">
				<?php get_template_part('template-parts/components/image', '', array('image_size' => 'medium', 'image_id' => $footer_logo, 'image_class' => 'object-contain')); ?>
			</picture>
			<div class="flex flex-col w-full gap-16">
				<?php
				// Call the menu function with the location name
				menu('menu-2');
				?>
				<div id="secondary-footer" class="flex flex-wrap-reverse justify-between gap-8">
					<div class="flex flex-wrap items-center justify-start gap-1 disclaimer">
						<span>
							&copy <?= date('Y') ?>
						</span>
						<?= $disclaimer ?>
					</div>
					<div class="flex items-center justify-center gap-4">
						<?php if (!empty($social_links) && $social_links["links"]): ?>

							<?php foreach ($social_links["links"] as $social_link): ?>
								<?php if (isset($social_link['icon']) && $social_link['icon']): ?>
									<a href="<?php echo esc_url($social_link['url']); ?>" aria-label="Social media link">
										<?php get_template_part('template-parts/components/image', '', array('image_size' => 'medium', 'image_id' => $social_link['icon'], 'image_class' => '')); ?>
									</a>
								<?php endif; ?>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

<?php
// Define the menu function outside of the footer template
function menu($menu_location)
{
	if (has_nav_menu($menu_location)) {
		wp_nav_menu(
			array(
				'theme_location' => $menu_location,
				'container' => 'ul',
				'menu_class' => 'footer-menu',
				'walker' => new Custom_Walker_Footer_Menu()
			)
		);
	}
}

class Custom_Walker_Footer_Menu extends Walker_Nav_Menu
{
	function start_lvl(&$output, $depth = 0, $args = null)
	{
		// Check if the current item has children (sub-menu)
		if ($args->walker->has_children) {
			$output .= '<ul class="sub-menu' . ($depth >= 1 ? 'child' : ' mt-[22px]') . '">';
		}
	}

	function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
	{
		// Check if the current item has children (sub-menu)
		$has_children = $args->walker->has_children;

		if ($depth === 0 && $has_children) {
			$output .= '<li class="flex flex-col menu-item menu-item-has-children">';
			$output .= '<a href="' . esc_url($item->url) . '" class="menu-item-link">' . esc_html($item->title) . '</a>';
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