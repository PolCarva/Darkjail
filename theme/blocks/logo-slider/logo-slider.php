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
$speed = get_field('speed') ?? 50;
$amount_of_logos = count($logos);

?>
<div id="<?php echo esc_attr($id); ?>" class="bg-ice mask-borders pb-[60px] lg:pb-[80px] <?php echo esc_attr($class_name); ?>">
    <?php if ($logos) : ?>
        <div id="<?php echo esc_attr($id); ?>" class="h-fit  overflow-x-hidden m-auto relative w-full bg-ice <?php echo esc_attr($class_name); ?>">
            <div class="slide-track  flex items-center">
                <?php foreach ($logos as $logo) : ?>
                    <div class="h-[68px] py-0 px-3 w-[100px] grid place-content-center">
                        <?php
                        $image_id = $logo['image'];
                        if ($image_id) :
                            get_template_part('template-parts/components/image', '', array(
                                'image_size' => 'large',
                                'image_id' => $image_id,
                                'image_class' => 'h-[68px] object-contain'
                            ));
                        endif;
                        ?>
                    </div>
                <?php endforeach; ?>

                <!-- Duplicamos las imágenes para lograr un scroll infinito -->
                <?php foreach ($logos as $logo) : ?>
                    <div class="h-[68px] py-0 px-3 w-[100px] grid place-content-center">
                        <?php
                        $image_id = $logo['image'];
                        if ($image_id) :
                            get_template_part('template-parts/components/image', '', array(
                                'image_size' => 'large',
                                'image_id' => $image_id,
                                'image_class' => 'h-[68px] object-contain'
                            ));
                        endif;
                        ?>
                    </div>
                <?php endforeach; ?>
                <?php foreach ($logos as $logo) : ?>
                    <div class="h-[68px] py-0 px-3 w-[100px] grid place-content-center">
                        <?php
                        $image_id = $logo['image'];
                        if ($image_id) :
                            get_template_part('template-parts/components/image', '', array(
                                'image_size' => 'large',
                                'image_id' => $image_id,
                                'image_class' => 'h-[68px] object-contain'
                            ));
                        endif;
                        ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<style>
    .mask-borders {
        mask-image: linear-gradient(to right, transparent 0, black 15%, black 85%, transparent 100%);
    }


    #<?= $id . " " ?>.slide-track {
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