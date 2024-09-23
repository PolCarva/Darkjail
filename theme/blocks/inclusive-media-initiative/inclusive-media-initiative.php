<?php

/**
 * Block Name: Inclusive Media Initiative
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'pixa_inclusive_media_initiative-' . $block['id'];
if (!empty($block['anchor'])) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "class_name" and "align" values.
$class_name = 'pixa_inclusive_media_initiative';
if (!empty($block['className'])) {
	$class_name .= ' ' . $block['className'];
}

// Load field(s) value.
$banner_image = get_field('banner_image');
$banner_image_mobile = get_field('banner_image_mobile');
$banner_logo = get_field('banner_logo');
$description = get_field('description');
$cta_text = get_field('cta_text');
$cta_link = get_field('cta_link');
?>
<section id="<?php echo esc_attr($id); ?>"
	class="<?php echo esc_attr($class_name); ?> pixa_inclusive_media_initiative inclusive-media-initiative">
	<div class="container-fluid c-container__sm">
		<div class="relative pixa-banner-inclusive-media-container">
			<?php if ($banner_image): ?>
				<?php
				get_template_part('template-parts/components/image', '', array(
					'image_id' => $banner_image['id'],
					'mobile_image_id' => $banner_image_mobile['id'],
					'image_size' => 'extra-large',
					'image_class' => 'object-cover absolute inset-0 w-full h-full',
					'image_position' => 'center'
				));
				?>
			<?php endif; ?>
			<div class="pixa-banner-inclusive-media-content-box">
				<div class="pixa-banner-inclusive-media-content">
					<?php if ($banner_logo): ?>
						<img src="<?php echo esc_url($banner_logo['url']); ?>" alt="<?php echo esc_attr($banner_logo['alt']); ?>"
							class="logo">
					<?php endif; ?>
					<?php if ($description): ?>
						<p>
							<?php echo $description; ?>
						</p>
					<?php endif; ?>

					<?php
						if (isset($cta_text) && isset($cta_link)) {
							get_template_part('template-parts/components/button', '', array(
								'type' => 'secondary',
								'size' => 'medium',
								'button' => [
									'text' => $cta_text,
									'url' => $cta_link,
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
<style>
	.inclusive-media-initiative {
		background-color: #DBFCFC;
		padding: 64px 0;
	}

	.background-image {
		width: 100%;
		height: 100%;
		object-position: 55% bottom;
		transform: scale(2.5);
		object-fit: contain;
	}

	.pixa-banner-inclusive-media-container {
		position: relative;
		width: 100%;
		height: 540px;
		overflow: hidden;
		border-radius: 14px;
		background-color: #ffffff;
	}

	.pixa-banner-inclusive-media-overlay {
		width: 100%;
		height: 100%;
		position: absolute;
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		z-index: 1;
		background: linear-gradient(-90deg, rgba(0, 0, 0, 0) 0%, rgb(0, 0, 0) 100%);
	}

	.pixa-banner-inclusive-media-picture {
		width: 100%;
		height: 100%;
	}

	.pixa-banner-inclusive-media-content-box {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		max-width: 30%;
		z-index: 2;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: start;
		gap: 24px;
		padding: 64px;
	}

	.pixa-banner-inclusive-media-content {
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: start;
		gap: 24px;
	}

	.pixa-banner-inclusive-media-content .logo {
		width: 256px;
		height: 65px;
	}

	.pixa-banner-inclusive-media-content p {
		color: #ffffff;
		font-family: Manrope;
		font-size: 16px;
		font-style: normal;
		font-weight: 400;
		line-height: 140%;
		/* 22.4px */
	}

	.pixa-banner-inclusive-media-content .learn-more-btn {
		display: flex;
		justify-content: center;
		align-items: center;
		gap: 12px;
		width: fit-content;
		height: 34px;
		padding: 8px 24px;
		color: #221F20;
		background-color: #ffffff;
		border-radius: 64px;
		transition: background-color 0.3s, color 0.3s;
		text-align: center;
		font-family: "PP Mori";
		font-size: 14px;
		font-style: normal;
		font-weight: 600;
		line-height: 100%;
		/* 14px */
	}

	.pixa-banner-inclusive-media-content .learn-more-btn:hover {
		background-color: #f0f0f0;
	}

	@media (max-width: 768px) {
		/* .pixa-banner-inclusive-media-container {
						height: 800px;
				} */

		.pixa-banner-inclusive-media-overlay {
			width: 100%;
			height: 100%;
			position: absolute;
			top: 0;
			right: 0;
			bottom: 0;
			left: 0;
			z-index: 1;
			background: linear-gradient(0deg, rgba(0, 0, 0, 0.00) -50.61%, #000 134.91%);
		}


		.pixa-banner-inclusive-media-content-box {
			max-width: 100%;
			padding: 32px;
		}

		.pixa-banner-inclusive-media-content p {
			color: #ffffff;
			font-family: Manrope;
			font-size: 14px;
			font-style: normal;
			font-weight: 400;
			line-height: 140%;
			/* 19.6px */
		}

		.pixa-banner-inclusive-media-content .learn-more-btn {
			display: flex;
			justify-content: center;
			align-items: center;
			gap: 12px;
			width: fit-content;
			height: 34px;
			padding: 8px 24px;
			color: #221F20;
			background-color: #ffffff;
			border-radius: 64px;
			transition: background-color 0.3s, color 0.3s;
			text-align: center;
			font-family: "PP Mori";
			font-size: 14px;
			font-style: normal;
			font-weight: 600;
			line-height: 100%;
			/* 14px */
		}
	}
</style>
