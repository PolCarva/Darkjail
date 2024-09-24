<?php

/**
 * Block Name: Our Offerings
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'pixa_our_offering-' . $block['id'];
if (!empty($block['anchor'])) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "class_name" and "align" values.
$class_name = 'pixa_our_offerings';
if (!empty($block['className'])) {
	$class_name .= ' ' . $block['className'];
}

// Load field(s) value.
$heading = get_field('heading') ?? 'Our Offerings';
$icon = get_field('icon');
$offerings = get_field('offerings'); // Repeater field for offerings

?>
<div id="<?php echo esc_attr($id); ?>" class="bg-ice <?php echo esc_attr($class_name); ?>">
	<section class="c-container__sm">
		<div>
			<h2 class="text-black font-semibold text-[40px] leading-[110%] mb-12"><?php echo esc_html($heading); ?></h2>
			<div class="grid grid-cols-1 lg:grid-cols-4 gap-x-8 gap-y-4">
				<?php if ($offerings): ?>
					<?php foreach ($offerings as $index => $offering): ?>
						<?php
						// Extract fields
						$title = $offering['title'] ?? '';
						$description = $offering['description'] ?? '';
						$link = $offering['link']['url'] ?? '#';
						$is_featured = $offering['is_featured'] ?? false;
						$recommended = $offering['recommended'] ?? false;

						$featured_class = ($is_featured && $index === 0) ? 'lg:col-span-2 lg:row-span-2' : '';
						?>
						<a href="<?php echo esc_url($link); ?>" class="block !no-underline w-full h-[289px] border border-cherry p-8 rounded-[10px] relative transition-all duration-300 hover:bg-white hover:border-white hover:scale-[1.03] <?php echo esc_attr($featured_class); ?>">
							<div class="flex justify-between items-start">
								<h3 class="text-black font-semibold text-[26px] md:text-[32px] leading-[120%] mb-8"><?php echo esc_html($title); ?></h3>
								<?php if ($recommended): ?>
									<span class="bg-cherry text-white px-4 py-1 rounded-full text-[14px] font-semibold">Recommended</span>
								<?php endif; ?>
							</div>
							<p class="text-black text-[18px] leading-[140%] max-w-[70%]"><?php echo esc_html($description); ?></p>
							<span class="absolute bottom-6 right-6 w-fit h-fit" aria-label="Learn more about <?php echo esc_attr($title); ?>">
								<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M1 1H28.6607V28.6607M1 28.6631L18.2656 11.3975" stroke="#221F20" stroke-width="2"
										stroke-linecap="round" stroke-linejoin="round" />
								</svg>
							</span>
						</a>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>
</div>

<?php if (isset($icon) && !empty($icon)): ?>
	<style>
		#<?php echo $id; ?> h2::before {
			content: '';
			background-image: url('<?php echo $icon; ?>');
			background-repeat: no-repeat;
			background-size: contain;
			display: block;
			height: 25px;
			margin: .5rem auto 1rem;
			width: 30px;
		}
	</style>
<?php endif; ?>
