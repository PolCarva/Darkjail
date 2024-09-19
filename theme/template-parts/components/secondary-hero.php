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
	<div class="pb-12 pt-6 lg:py-12" style="background-image: linear-gradient(<?php echo $gradient_angle; ?>deg, <?php echo $gradient_start_color; ?> , <?php echo $gradient_end_color; ?>);">
		<div class="max-content-inner-big flex flex-col-reverse lg:flex-row">
			<div class="hero-info flex flex-col justify-center lg:max-w-lg text-white">
				<h1 class="hero-heading h1 text-white "><?php echo esc_html($heading); ?></h1>
				<?php
				if (isset($subheading) && $subheading) :
				?>
					<div class="hero-subheading text-lg mb-6 prose-p:mb-4"><?php echo $subheading; ?></div>
				<?php endif; ?>
				<?php
				// Button if $button is set, if not prevent warning
				if (isset($button) && is_array($button) && isset($button['text']) && isset($button['url']) && $button['text'] && $button['url']) {
					get_template_part('template-parts/components/button', '', array('type' => 'primary', 'button' => $button));
				}

				?>
			</div>
			<div class="hero-image flex justify-center lg:justify-end w-full">
				<?php get_template_part('template-parts/components/image', '', array('image_size' => 'medium', 'image_id' => $image, 'image_class' => 'max-w-full lg:max-w-[500px] object-contain mb-8 lg:mb-0 p-4 bg-slate-100 rounded-lg')); ?>
			</div>
		</div>
	</div>
</section>
<?php if ($show_sub_banner) : ?>
	<section class="bg-slate-300">
		<div class="max-content-inner-big flex flex-col lg:flex-row justify-center items-center lg:items-start text-white m-auto py-6 lg:gap-8">
			<h3 class="h2 text-custom-primary mb-4 lg:mb-0"><?php echo esc_html($second_heading); ?></h3>
			<?php
			if (isset($second_button) && is_array($second_button) && isset($second_button['text']) && isset($second_button['url']) && $second_button['text'] && $second_button['url']) {
				get_template_part('template-parts/components/button', '', array('type' => 'primary', 'button' => $second_button));
			}
			?>
	</section>
<?php endif; ?>