<?php
/*
Use example:

get_template_part('template-parts/components/secondaryhero', '', array(
    'heading' => 'my heading',
    'subheading' => 'my subheading',
    'image' => 3,
    'button' => array(
        'text' => 'Button Text',
        'url' => 'https://example.com/button-url',
    ),
    'gradient_start_color' => 'red',
    'gradient_end_color' => 'blue',
    'gradient_angle' => '90',
    'second_heading' => 'my second heading',
    'second_button' => $buttonArray,

*/
// Extract the variables from the array
extract($args);

?>

<section>
	<div class="pt-6 pb-12 lg:py-12" style="background-image: linear-gradient(<?php echo $gradient_angle; ?>deg, <?php echo $gradient_start_color; ?> , <?php echo $gradient_end_color; ?>);">
		<div class="flex flex-col-reverse max-content-inner-big lg:flex-row">
			<div class="flex flex-col justify-center text-white hero-info lg:max-w-lg">
				<h1 class="text-white hero-heading h1 "><?php echo esc_html($heading); ?></h1>
				<?php
				if (isset($subheading) && $subheading) :
				?>
					<div class="mb-6 text-lg hero-subheading prose-p:mb-4"><?php echo $subheading; ?></div>
				<?php endif; ?>
				<?php
				// Button if $button is set, if not prevent warning
				if (isset($button) && is_array($button) && isset($button['text']) && isset($button['url']) && $button['text'] && $button['url']) {
					get_template_part('template-parts/components/button', '', array('type' => 'primary', 'button' => $button));
				}

				?>
			</div>
			<div class="flex justify-center w-full hero-image lg:justify-end">
				<?php get_template_part('template-parts/components/image', '', array('image_size' => 'medium', 'image_id' => $image, 'image_class' => 'max-w-full lg:max-w-[500px] object-contain mb-8 lg:mb-0 p-4 bg-slate-100 rounded-lg')); ?>
			</div>
		</div>
	</div>
</section>
<?php if ($show_sub_banner) : ?>
	<section class="bg-slate-300">
		<div class="flex flex-col items-center justify-center py-6 m-auto text-white max-content-inner-big lg:flex-row lg:items-start lg:gap-8">
			<h3 class="mb-4 h2 lg:mb-0"><?php echo esc_html($second_heading); ?></h3>
			<?php
			if (isset($second_button) && is_array($second_button) && isset($second_button['text']) && isset($second_button['url']) && $second_button['text'] && $second_button['url']) {
				get_template_part('template-parts/components/button', '', array('type' => 'primary', 'button' => $second_button));
			}
			?>
	</section>
<?php endif; ?>
