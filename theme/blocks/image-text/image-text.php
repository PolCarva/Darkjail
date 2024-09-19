<?php
$heading = get_field('heading');
$description = get_field('description');
$image = get_field('image');
$invert_image = get_field('invert_image');
?>


<section class="flex flex-col <?php if ($invert_image) : ?>md:flex-row-reverse<?php else : ?>md:flex-row<?php endif; ?> container-mid m-auto py-12 gap-8">
    <div class="md:w-1/2">
        <?php get_template_part('template-parts/components/image', '', array('image_size' => 'large', 'image_id' => $image, 'image_class' => 'rounded-lg')); ?>
    </div>
    <div class="md:w-1/2">
        <h1 class="h1"><?php echo esc_html($heading); ?></h1>
        <p class="text-lg mb-6"><?php echo esc_html($description); ?></p>
    </div>
</section>