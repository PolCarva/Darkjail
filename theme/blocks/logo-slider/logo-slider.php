<?php

/**
 * Block Name: Our Offerings
 */

// Create id attribute allowing for custom "anchor" value.
$block_id = 'logo_slider-' . $block['id'];
if (!empty($block['anchor'])) {
	$block_id = $block['anchor'];
}

// Create class attribute allowing for custom "class_name" and "align" values.
$class_name = 'logo_sliders';
if (!empty($block['className'])) {
	$class_name .= ' ' . $block['className'];
}

$logos = get_field('logos');
$speed = get_field('speed') ?? 50;
$amount_of_logos = count($logos);

?>
<div id="<?php echo esc_attr($block_id); ?>"
	class="mask-borders my-20 <?php echo esc_attr($class_name); ?>">
	<?php if ($logos): ?>
		<div
			class="h-fit  overflow-x-hidden m-auto relative w-full <?php echo esc_attr($class_name); ?>">
			<div class="flex items-center slide-track">
				<?php foreach ($logos as $logo): ?>
					<?php
					$image_id = $logo['image'];
					$negative_margin = $logo['negative_margin'] ?? '0';
					?>
					<div class="h-[50px] md:h-[68px] py-0 w-fit grid place-content-center" style="margin-inline: <?= $negative_margin ?>px;">
						<?php
						if ($image_id):
							get_template_part('template-parts/components/image', '', array(
								'image_size' => 'large',
								'image_id' => $image_id,
								'image_class' => 'h-[50px] md:h-[68px] object-contain'
							));
						endif;
						?>
					</div>
				<?php endforeach; ?>

				<?php foreach ($logos as $logo): ?>
					<?php
					$image_id = $logo['image'];
					$negative_margin = $logo['negative_margin'] ?? '0';
					?>
					<div class="h-[50px] md:h-[68px] py-0 w-fit grid place-content-center" style="margin-inline: <?= $negative_margin ?>px;">
						<?php
						if ($image_id):
							get_template_part('template-parts/components/image', '', array(
								'image_size' => 'large',
								'image_id' => $image_id,
								'image_class' => 'h-[50px] md:h-[68px] object-contain'
							));
						endif;
						?>
					</div>
				<?php endforeach; ?>
				<?php foreach ($logos as $logo): ?>
					<?php
					$image_id = $logo['image'];
					$negative_margin = $logo['negative_margin'] ?? '0';
					?>
					<div class="h-[68px] py-0 w-fit grid place-content-center" style="margin-inline: <?= $negative_margin ?>px;">
						<?php
						if ($image_id):
							get_template_part('template-parts/components/image', '', array(
								'image_size' => 'large',
								'image_id' => $image_id,
								'image_class' => 'h-[50px] md:h-[68px] object-contain'
							));
						endif;
						?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	<?php endif; ?>
	<style>
		.mask-borders {
			mask-image: linear-gradient(to right, transparent 0, black 15%, black 85%, transparent 100%);
		}


		#<?= $block_id . " " ?>.slide-track {
			width: calc(100px * <?= $amount_of_logos * 3 ?>);
			height: 68px;
			animation: scrollLogos <?= $speed ?>s linear infinite;
		}


		@keyframes scrollLogos {
			0% {
				transform: translateX(0);
			}

			100% {
				transform: translateX(calc(-100px *<?= $amount_of_logos ?>));
			}
		}
	</style>
</div>