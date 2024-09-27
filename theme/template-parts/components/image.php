<?php
/*
Use example:
		get_template_part('template-parts/components/image', '',
		array(
				'image_size' => 'medium',
				'image_id' => $footer_logo,
				'image_position' => 'top',
				image_class' => 'rounded-lg'
		));


*/

// Extract the variables from the array
extract($args);

$image_id = $image_id;
$mobile_image_id = $mobile_image_id ?? '';
$image_position = $image_position ?? 'center';
$alt_text = $image_alt ?? get_post_meta($image_id, '_wp_attachment_image_alt', true);
$image_size = $image_size ?? 'large';
$image_class = $image_class ?? '';
$image_width = $image_width ?? 'unset';
$image_height = $image_height ?? 'unset';
$loading = $loading ?? 'lazy';
?>


<?php if ($image_id) : ?>
	<?php
		$image_url = wp_get_attachment_image_src($image_id, 'extra-large');
		$mobile_image_url = $mobile_image_id ? wp_get_attachment_image_src($mobile_image_id, 'large') : null;
	?>

	<!-- Verify if $mobile_image_url is defined before accessing its indexes -->
	<?php if (isset($mobile_image_url[0], $mobile_image_url[1])) : ?>
		<!-- // Mostrar la imagen móvil solo si $mobile_image_url está definido -->
		<img
			loading="<?= esc_attr($loading); ?>"
			src="<?= esc_url($mobile_image_url[0]); ?>" class="<?= esc_attr($image_class); ?> block md:hidden"
			alt="<?= esc_attr($alt_text); ?>" width="<?= esc_attr($mobile_image_url[1]); ?>"
			height="<?= esc_attr($mobile_image_url[2]); ?>" style="object-position: <? echo $image_position; ?>";
		>
		<img
			loading="<?= esc_attr($loading); ?>"
			src="<?= esc_url($image_url[0]); ?>" class="<?= esc_attr($image_class); ?> hidden md:block"
			alt="<?= esc_attr($alt_text); ?>" width="<?= esc_attr($image_url[1]); ?>"
			height="<?= esc_attr($image_url[2]); ?>" style="object-position: <?= $image_position; ?>";
		>
	<?php else : ?>
		<!-- Mostrar la imagen de escritorio si no hay imagen móvil -->
		<img
			loading="<?= esc_attr($loading); ?>"
			src="<?= esc_url($image_url[0]); ?>" class="<?= esc_attr($image_class); ?> block"
			alt="<?= esc_attr($alt_text); ?>" width="<?= esc_attr($image_url[1]); ?>"
			height="<?= esc_attr($image_url[2]); ?>" style="object-position: <?= $image_position; ?>";
		>
	<?php endif; ?>
<?php endif; ?>
