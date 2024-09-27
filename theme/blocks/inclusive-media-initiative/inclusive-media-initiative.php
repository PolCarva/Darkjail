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
    class="<?php echo esc_attr($class_name); ?> bg-ice pb-[100px]">
    <div class="c-container__sm">
        <div class="relative rounded-lg overflow-hidden bg-white h-[540px]">
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
            <div class="absolute top-0 left-0 w-full md:max-w-[70%] lg:max-w-[38%] z-10 flex flex-col justify-center items-start gap-5 p-[24px] md:p-16">
                <div class="flex flex-col items-start justify-center gap-6">
                    <?php if ($banner_logo): ?>
                        <img src="<?php echo esc_url($banner_logo['url']); ?>"
                            alt="<?php echo esc_attr($banner_logo['alt']); ?>"
                            class="w-64 h-16">
                    <?php endif; ?>
                    <?php if ($description): ?>
                        <p class="text-white !my-0 text-[16px] font-normal leading-[140%]">
                            <?php echo $description; ?>
                        </p>
                    <?php endif; ?>

                    <?php
                    if (isset($cta_text) && isset($cta_link)) {
                        get_template_part('template-parts/components/button', '', array(
                            'type' => 'secondary-white',
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
