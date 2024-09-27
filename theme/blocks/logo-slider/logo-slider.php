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

$logos = get_field('logos');

?>
<div id="<?php echo esc_attr($id); ?>" class="bg-ice <?php echo esc_attr($class_name); ?>">
    <section class="c-container"
        x-data="logoSlider"
        x-init="initSlider(1000, 2)">
        <div class="swiper-wrapper !ease-linear">
            <?php if ($logos): ?>
                <?php foreach ($logos as $logo): ?>
                    <?php
                    $image = $logo['image'] ?? '';
                    ?>
                    <div class="swiper-slide !w-12">
                        <?php
                        $logo_classes = "object-contain brightness-0";            
            
                        get_template_part('template-parts/components/image', '', array(
                            'image_id' => $image,
                            'mobile_image_id' => $image,
                            'image_size' => 'small',
                            'image_class' => $logo_classes,
                            'image_position' => 'center'
                        ));
                        ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>
    </section>
</div>

<style >
    .mask-borders {
    mask-image: linear-gradient(to right, transparent 0, black 10%, black 90%, transparent 100%);
    }
</style>