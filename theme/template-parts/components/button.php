<?php

/**
 * Button Component
 *
 * @param string $type   The button type (e.g., primary, secondary, etc.).
 * @param string $size  The button size (e.g., medium, large).
 * @param array  $button An array of button fields.
 */

/* Usage:
	get_template_part( 'template-parts/components/button', '', array(
		'type' => 'secondary',
		'size' => 'medium',
		'button' => [
			'text' => $cta_text,
			'url' => $cta_link,
			'target' => '_self',
		],
	))
*/


// Extract the variables from the array
extract($args);

$text = $button['text'];
$url = $button['url'] ?? '';
$button_type = $button['_type'] ?? 'button';
$target = $url['target'] ?? '_self';

//show_icon should be optional
$custom_class = $button['custom_class'] ?? '';
$container_class = $button['container_class'] ?? 'h-fit w-fit';

$type ??= 'primary';
$size ??= 'medium';

// bg-primary-blue rounded-full text-white hover:bg-custom-secondary hover:text-white py-2 px-6 font-semibold uppercase tracking-wider focus:outline-none
$classes = '';
$svg_color = '';

// make a switch case for the button type
switch ($type) {
	case 'primary':
		$classes = '!text-white bg-black hover:bg-[#000] border border-black hover:border-[#000] transition-all disabled:opacity-40 rounded-full focus:outline-none';
		break;
	case 'secondary';
		$classes = '!text-black bg-transparent border border-black hover:border-black/50 transition-all disabled:opacity-50 rounded-full focus:outline-none inline-flex items-center gap-3';
		break;
	case 'secondary-white';
		$classes = '!text-black bg-white border border-white hover:border-black/50 transition-all disabled:opacity-50 rounded-full focus:outline-none inline-flex items-center gap-3';
		break;
	case 'icon-text';
		$classes = '!text-white bg-black hover:bg-[#000] transition-all disabled:opacity-50 rounded-full focus:outline-none inline-flex items-center gap-3';
		$svg_color = '#FFFFFF';
		break;
	case 'secondary-icon':
		$classes = '!text-black bg-white border border-black hover:border-black/50 transition-all disabled:opacity-50 rounded-full focus:outline-none inline-flex items-center gap-3';
		$svg_color = '#000000';
		break;
	case 'ghost':
		$classes = "!px-0 mx-6 !text-black bg-white relative hover:after:w-full after:content-[''] after:absolute after:bottom-[1px] after:h-[1px] after:w-0 after:bg-black after:transition-all disabled:opacity-50 focus:outline-none inline-flex items-center gap-3";
		$svg_color = '#000000';
		break;
	default:
		$classes = '!text-white bg-black hover:bg-[#000] transition-all disabled:opacity-40 rounded-full focus:outline-none';
		break;
}

$classes .= match ($size) {
	'medium' => ' px-6 py-3 btn_m',
	'large' => ' px-8 py-[17.5px] btn_l',
	default => ' px-6 py-3 btn_m',
};

// Add more cases for other button types as needed.

// if $show_icon add 'flex justify-center items-center' to $classes
// if ($show_icon) {
// 	$classes .= ' flex justify-center items-center group min-h-[48px] w-fit ';
// }
if (!empty($custom_class)) {
	$classes .= ' ' . $custom_class;
}

?>

<?php
if (!empty($text) && !empty($url)) {
	?>
	<div class="<?= $container_class ?>">
		<a href="<?= esc_url($url['url']); ?>" target="<?= $target ?>" class="<?= $classes ?> !no-underline button-component">
			<?php if (strpos($type, 'icon') !== false || strpos($type, 'ghost') !== false): ?>
				<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M8 3V13" stroke="<?= $svg_color ?>" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
					<path d="M13 8H3" stroke="<?= $svg_color ?>" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
				</svg>
			<?php endif; ?>
			<span class="text-center md:whitespace-nowrap">
				<?= esc_html($text); ?>
			</span>
		</a>
	</div>
	<?php
} elseif (!empty($text)) {
	?>
	<div class="<?= $container_class ?>">
		<button class="<?= $classes ?> button-component" type="<?= $button_type ?>">
			<?php if (strpos($type, 'icon') !== false || strpos($type, 'ghost') !== false): ?>
				<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M8 3V13" stroke="<?= $svg_color ?>" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
					<path d="M13 8H3" stroke="<?= $svg_color ?>" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
				</svg>
			<?php endif; ?>
			<span class="text-center md:whitespace-nowrap">
				<?= esc_html($text); ?>
			</span>
		</button>
	</div>
	<?php
}
?>
