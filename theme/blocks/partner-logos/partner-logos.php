<?php

/**
 * Block Name: Partner Logos
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'pixa_content_logos-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "class_name" and "align" values.
$class_name = 'pixa_content_logos';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

$logos = get_field('logos');
$black_logos = get_field('black_logos');
?>

<div id="<?php echo esc_attr($id); ?>" class="bg-ice <?php echo esc_attr($class_name); ?>">
<div class=" py-12 c-container">
    <div class="md:w-fit w-full h-fit mx-auto md:h-fit flex flex-wrap flex-col md:flex-row gap-5 items-center justify-center">
        <?php foreach ($logos as $logo) : ?>
            <?php
            $base_classes = "object-contain";

            $logo_size_classes = "h-32 w-full max-w-sm sm:h-24 sm:w-40 md:max-w-none md:h-24 md:w-48 to lg:h-28 lg:w-56";

            $black_logos_classes = "brightness-0";

            $logo_classes = $black_logos ? $base_classes . ' ' . $logo_size_classes . ' ' . $black_logos_classes : $base_classes . ' ' . $logo_size_classes;

            get_template_part('template-parts/components/image', '', array(
                'image_id' => $logo["logo"]['id'],
                'image_size' => 'large',
                'image_class' => $logo_classes,
                'image_position' => 'center'
            ));
            ?>
        <?php endforeach; ?>
    </div>
</div>

</div>