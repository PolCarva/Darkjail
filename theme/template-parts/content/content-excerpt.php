<?php

/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package darkjail_acf_tailwind
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post flex">
		<div class="content">
			<?php //<h2 class="entry-header"> 
			?>
			<?php
			if (is_sticky() && is_home() && !is_paged()) {
				printf('%s', esc_html_x('Featured', 'post', 'darkjail-acf-tailwind'));
			}
			the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');
			?>
			<?php //</h2><!-- .entry-header -->
			?>
			<div class="entry-footer">
				<?php darkjail_acf_tailwind_entry_footer(); ?>
			</div><!-- .entry-footer -->
			<div <?php darkjail_acf_tailwind_content_class('entry-content'); ?>>
				<?php the_excerpt(); ?>
			</div><!-- .entry-content -->

		</div>

		<?php darkjail_acf_tailwind_post_thumbnail(); ?>
	</div>


</article><!-- #post-${ID} -->