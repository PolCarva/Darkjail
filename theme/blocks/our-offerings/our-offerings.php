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
$offerings = get_field('offerings'); // Repeater field for offerings

?>
<div id="<?php echo esc_attr($id); ?>" class="bg-ice pb-[100px] lg:pb-[120px] <?php echo esc_attr($class_name); ?>">
	<section class="c-container__sm">
		<div>
			<h2 class="h4 pb-4 lg:pb-[50px] !mb-0"><?php echo esc_html($heading); ?></h2>
			<div class="grid grid-cols-1 lg:flex gap-x-8 gap-y-4">
				<?php if ($offerings): ?>
					<?php foreach ($offerings as $index => $offering): ?>
						<?php
						// Extract fields
						$title = $offering['title'] ?? '';
						$description = $offering['description'] ?? '';
						$link = $offering['link']['url'] ?? '#';
						$is_featured = $offering['is_featured'] ?? false;
						$recommended = $offering['recommended'] ?? false;

						$featured_class = ($is_featured && $index === 0) ? 'lg:flex-grow' : 'lg:flex-shrink lg:max-w-[341px]';
						?>
						<a href="<?php echo esc_url($link); ?>" class="flex flex-col justify-between lg:justify-start items-start !no-underline w-full lg:h-[289px] border border-cherry p-[24px] lg:p-8 rounded-[10px] relative transition-all duration-300 group <?php echo esc_attr($featured_class); ?>">
							<div class="flex justify-between self-stretch items-start">
								<h3 class="!mb-[36px] h-[2.2em] text-black underline-offset-[1.8px] decoration-1 group-hover:underline font-semibold text-[26px] md:text-[32px] leading-[120%]"><?php echo esc_html($title); ?></h3>
								<?php if ($recommended): ?>
									<span class="bg-cherry text-white px-[20px] py-[10px] leading-none rounded-full text-[14px] !my-0 font-semibold">Recommended</span>
								<?php endif; ?>
							</div>
							<p class="my-0 text-black/50 body3 line-clamp-4 max-w-[calc(100%-42px)] <?php if ($is_featured) echo "md:max-w-[80%]" ?>"><?php echo esc_html($description); ?></p>
							<span class="absolute group-hover:text-cherry transition bottom-6 right-6 w-fit h-fit" aria-label="Learn more about <?php echo esc_attr($title); ?>">
								<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path class="stroke-black group-hover:stroke-cherry transition" d="M1 1H28.6607V28.6607M1 28.6631L18.2656 11.3975" stroke-width="2"
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