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
<div id="<?php echo esc_attr($id); ?>" class="bg-ice <?php echo esc_attr($class_name); ?>">
	<section class="py-5 c-container">
		<div class="container-fluid">
			<div class="pixa-banner-youtube-container">
				<?php
				get_template_part('template-parts/components/image', '', array(
					'image_id' => $image["id"],
					'mobile_image_id' => $image_mobile["id"],
					'image_size' => 'large',
					'image_class' => 'object-cover w-full h-full',
					'image_position' => 'center'
				));
				?>

				<div class="pixa-banner-youtube-content-wrapper">
					<div class="pixa-banner-youtube-content">
						<h2 class="pixa-banner-youtube-banner-title">
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
		</div>
	</section>
</div>
<style type="text/css">
	.pixa-banner-youtube-container {
		position: relative;
		height: 540px;
		border-radius: 14px;
		overflow: hidden;
	}

	.pixa-banner-youtube-banner-image {
		width: 100%;
		height: 100%;
		object-fit: cover;
		object-position: middle bottom;
	}

	.pixa-banner-youtube-content-wrapper {
		position: absolute;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		display: flex;
		gap: 32px;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		text-align: center;
	}

	.pixa-banner-youtube-content {
		max-width: 50%;
		margin: auto;
		display: flex;
		gap: 32px;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		text-align: center;
	}

	.pixa-banner-youtube-banner-title {
		color: #FFF;
		text-align: center;
		font-size: 92px;
		font-style: normal;
		font-weight: 400;
		line-height: 100%;
		/* 92px */
		letter-spacing: -1.84px;
	}

	.cta-button {
		display: inline-flex;
		height: 34px;
		padding: 8px 24px;
		justify-content: center;
		align-items: center;
		gap: 12px;
		flex-shrink: 0;
		transition: background-color 0.3s ease, transform 0.3s ease;
		color: #221F20;
		text-align: center;
		font-size: 14px;
		font-style: normal;
		font-weight: 600;
		line-height: 100%;
		/* 14px */
		background-color: #ffffff;
		border-radius: 64px;
	}

	.cta-button:hover {
		background-color: #f0f0f0;
		color: #221F20;
		transform: translateY(-2px);
	}

	@media (max-width: 768px) {}
</style>
