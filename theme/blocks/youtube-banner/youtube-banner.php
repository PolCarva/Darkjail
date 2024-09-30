<?php

/**
 * Block Name: Case Studies
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'pixa_case_studies-' . $block['id'];
if (!empty($block['anchor'])) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "class_name" and "align" values.
$class_name = 'pixa_case_studies';
if (!empty($block['className'])) {
	$class_name .= ' ' . $block['className'];
}

// Load field(s) value.
$heading = get_field('heading');
$second_line_heading = get_field('second_line_heading');
$image = get_field('background_image');
$image_mobile = get_field('mobile_background_image') ?? '';
$button_link = get_field('button_link');
$button_text = get_field('button_text');


?>
<div id="<?php echo esc_attr($id); ?>" class="bg-ice pb-[40px] <?php echo esc_attr($class_name); ?>">
	<section class="c-container">
		<div class="relative h-[540px] rounded-[14px] overflow-hidden">
			<?php
			get_template_part('template-parts/components/image', '', array(
				'image_id' => $image["id"],
				'mobile_image_id' => $image_mobile["id"],
				'image_size' => 'large',
				'image_class' => 'object-cover w-full h-full',
				'image_position' => 'center'
			));
			?>
			<div class="absolute inset-0 bg-black/20"></div>

			<div class="absolute inset-0 flex flex-col items-center justify-center gap-8 text-center">
				<div class="flex flex-col gap-[48px] justify-center items-center text-center mx-auto">
					<h2 class="!text-white text-[44px] lg:text-[92px] !my-0 h1 ">
						<?php echo $heading; ?>
						</br>
						<?php echo $second_line_heading; ?>
					</h2>
					<?php
					if (isset($button_text) && isset($button_link)) {
						get_template_part('template-parts/components/button', '', array(
							'type' => 'secondary-white',
							'size' => 'medium',
							'button' => [
								'text' => $button_text,
								'url' => $button_link,
								'target' => '_self',
							],
						));
					}
					?>
				</div>
			</div>
		</div>
	</section>
</div>