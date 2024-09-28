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
$heading = get_field('pixa_heading');
$case_studies = get_field('case_studies');
?>
<div id="<?php echo esc_attr($id); ?>" class="bg-ice pb-[100px] lg:pb-[90px] <?php echo esc_attr($class_name); ?>">
	<section>
		<div class="c-container__sm">
			<h2 class="h4 pb-4 lg:pb-[50px] !mb-0"><?php echo esc_html($heading); ?></h2>
			<div
				class="grid grid-cols-1 md:grid-cols-2 grid-rows-[auto] md:grid-rows-2 gap-4 md:gap-y-[50px] md:gap-x-[54px]">
				<?php if ($case_studies): ?>
					<?php foreach ($case_studies as $index => $case_study): ?>
						<?php
						// Get values from the repeater fields
						$title = $case_study['title'];
						$tag = $case_study['tag'];
						$image_id = $case_study['image'];
						$image_url = wp_get_attachment_image_url($image_id, 'full');
						$link = $case_study['link'] ?? '#';
						?>
						<div
							class="<?php echo ($index === 0) ? 'col-auto md:col-[1_/_2] md:row-[1_/_3] h-full' : 'col-auto md:col-[2_/_3]'; ?>	row-auto">
							<a class="group hover:z-[1] hover:scale-[1.03] relative overflow-hidden !no-underline text-inherit block transition-transform duration-[0.3s] ease-[ease] rounded-[10px]
														<?php echo ($index === 0) ? '' : 'flex flex-col h-full'; ?>" href="<?= $link ?>">
								<img
								 	loading="lazy"
									class="<?php echo ($index === 0) ? 'aspect-[3/4] md:aspect-[608/690] max-h-[690px]' : 'aspect-[608/234] max-h-[234px]'; ?> group-hover:scale-[1.03] w-full h-full object-cover block transition-transform duration-[0.3s] ease-[ease]"
									src="<?php echo esc_url($image_url); ?>" alt="">
								<div
									class="flex flex-col gap-4 transition-all duration-300 ease-[ease] p-4 md:px-[26px] md:py-[22px] bottom-0 inset-x-0 bg-white">
									<?php if ($tag): ?>
										<span class="text-cherry subtitle2  !my-0"><?php echo esc_html($tag); ?></span>
									<?php endif; ?>
									<h3 class="text-black body1 !my-0 <?php echo ($index === 0) ? '' : 'lg:max-w-[80%]'; ?>">
										<?php echo esc_html($title); ?></h3>
								</div>
							</a>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>
</div>
