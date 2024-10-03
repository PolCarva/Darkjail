<?php

/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package darkjail_acf_tailwind
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<section class="entry-header">
		<?php
		ob_start(); // Start output buffering
		darkjail_acf_tailwind_posted_on(); // Call the function, which will echo its output
		$entry_date_html = ob_get_clean(); // Capture the echoed content and store it in a variable

		// Create a DOMDocument instance and load the HTML
		$doc = new DOMDocument();
		@$doc->loadHTML($entry_date_html);

		// Find the <a> element
		$aElement = $doc->getElementsByTagName('a')->item(0);

		// Get the anchor text
		$entry_date = $aElement->nodeValue;

		get_template_part('template-parts/components/hero', '', array(
			'heading' => $post->post_title,
			'subheading' => $entry_date,
			'image' => get_post_thumbnail_id($post->ID),
			'right_align' => false,
			'desktop_full_width' => false,
			'heading_type' => 'h1'
		));
		?>


		<?php if (!is_page()) : ?>
			<div class="entry-meta">
				<?php //darkjail_acf_tailwind_entry_meta(); CATEGORIES ?? 
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</section><!-- .entry-section -->


	<div <?php darkjail_acf_tailwind_content_class('entry-content container-mid m-auto py-12 '); ?>>
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers. */
					__('Continue reading<span class="sr-only"> "%s"</span>', 'darkjail-acf-tailwind'),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);

		/*
		wp_link_pages(
			array(
				'before' => '<div>' . __('Pages:', 'darkjail-acf-tailwind'),
				'after'  => '</div>',
			)
		);
		*/
		?>
	</div><!-- .entry-content -->

</article><!-- #post-${ID} -->