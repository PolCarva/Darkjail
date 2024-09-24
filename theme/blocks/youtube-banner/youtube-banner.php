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
$image = get_field('background_image');
$image_mobile = get_field('mobile_background_image') ?? '';
$button_link = get_field('button_link');
$button_text = get_field('button_text');

?>
<div id="<?php echo esc_attr($id); ?>" class="bg-ice hidden md:block <?php echo esc_attr($class_name); ?>">
	<section class="py-5 c-container">
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

			<div class="absolute inset-0 flex flex-col gap-8 justify-center items-center text-center">
				<div class="flex flex-col gap-[48px] justify-center items-center text-center max-w-[50%] mx-auto">
					<h2 class="text-white !my-0 text-[92px] font-normal leading-none tracking-[-1.84px]">
						<?php echo esc_html($heading); ?>
					</h2>
					<?php
					if (isset($button_text) && isset($button_link)) {
						get_template_part('template-parts/components/button', '', array(
							'type' => 'secondary',
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
