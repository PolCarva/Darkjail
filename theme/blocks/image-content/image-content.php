<?php

$main_image = get_field('main_image');
$inverted = get_field('inverted');

$block_id = uniqid('image-content-');

?>

<section id="<?= $block_id ?>">
    <div class="c-container w-full h-full flex flex-col gap-10 md:gap-2 <?php echo $inverted ? 'md:flex-row-reverse' : 'md:flex-row' ?>">
        <div class="md:w-1/2 flex md:justify-end">
            <?php if ($main_image) {
                get_template_part('template-parts/components/image', '', array(
                    'image_id' => $main_image,
                    'image_class' => 'w-full md:max-h-[500px] h-full object-contain',
                    'image_size' => 'medium',
                ));
            }
            ?>
        </div>
        <div class="md:w-1/2">
            <InnerBlocks class="md:px-0 flex h-full flex-col justify-center <?php echo $inverted ? 'items-end' : 'items-start' ?>" />
        </div>
    </div>

    <?php
    get_template_part('template-parts/styles/margin-styles', '', array(
        'section_id' => $block_id,
    ));
    ?>
</section>