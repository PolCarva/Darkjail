<?php

/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dango_acf_tailwind
 */

$footer_logo = get_field('footer_logo', 'option');
$footer_description = get_field('footer_description', 'option');
$footer_contact = get_field('footer_contact', 'option');
$social_links = get_field('social_links', 'option') ?: array();

// get_template_part('template-parts/layout/newsletter', 'content');

?>

<footer id="colophon" class="flex flex-col gap-8 py-8 text-white bg-black">
	<div class="flex flex-col justify-between w-full gap-12 md:flex-row max-content-inner-big">
		<ul class="flex flex-col justify-start  max-w-[400px]">
			<li class="mb-4 ">
				<?php get_template_part('template-parts/components/image', '', array('image_size' => 'medium', 'image_id' => $footer_logo, 'image_class' => '')); ?>
			</li>
			<li class="mb-4">
				<?php echo $footer_description; ?>
			</li>
			<li class="mb-4">
				<?php echo $footer_contact; ?>
			</li>
		</ul>
		<div class="flex flex-col gap-16 md:flex-row">
			<ul>
				<li>
					<?php
					// Call the menu function with the location name
					menu('menu-2');
					?>
				</li>
			</ul>
			<ul>
				<li>
					<?php
					// Call the menu function with the location name
					menu('menu-3');
					?>
				</li>
			</ul>
			<div class="">
				<h4 class="font-bold">Follow us</h4>
				<div class="flex ml-[-15px]">
					<?php if (!empty($social_links)) : ?>
						<?php foreach ($social_links[""] as $social_link) : ?>
							<?php if (isset($social_link['icon']) && $social_link['icon']) : ?>
								<a href="<?php echo esc_url($social_link['url']); ?>">
									<?php get_template_part('template-parts/components/image', '', array('image_size' => 'medium', 'image_id' => $social_link['icon'], 'image_class' => 'invert')); ?>
								</a>
							<?php endif; ?>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>

			</div>
		</div>
	</div>
	<div id="secondary-footer" class="justify-between w-full gap-12 max-content-inner-big">
		<p>&copy <?php echo  date('Y') . " " . $site_logo_id = get_theme_mod('custom_company_name'); ?> - All Rights Reserved</p>

		<?php



		/* translators: 1: WordPress link, 2: WordPress. */
		/*
				$dango_acf_tailwind_blog_info = get_bloginfo('name');
		if (!empty($dango_acf_tailwind_blog_info)) :
		?>
			<a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>,
		<?php
		endif;
		printf(
			'<a href="%1$s">proudly powered by %2$s</a>.',
			esc_url(__('https://wordpress.org/', 'dango-acf-tailwind')),
			'WordPress'
		);
		*/
		?>
	</div>







</footer><!-- #colophon -->

<?php
// Define the menu function outside of the footer template
function menu($menu_location)
{
	if (has_nav_menu($menu_location)) :
?>
		<nav aria-label="<?php esc_attr_e('Footer Menu', 'dango-acf-tailwind'); ?>">
			<?php

			// Get the assigned menu ID for the specified theme location
			$menu_id = get_nav_menu_locations()[$menu_location];

			if ($menu_id) {
				// Get the menu object based on the menu ID
				$menu_object = wp_get_nav_menu_object($menu_id);

				if ($menu_object) {
					$menu_name = $menu_object->name;

					// Output the menu name
			?>
					<h4 class="mb-3 font-bold"><?php echo esc_html($menu_name); ?></h4>
			<?php
				}
			}

			wp_nav_menu(
				array(
					'theme_location' => $menu_location,
					'menu_class'     => 'footer-menu',
					'depth'          => 1,
				)
			);
			?>
		</nav>
<?php endif;
}
?>
