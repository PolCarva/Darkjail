<?php
$image = get_field('image');
$heading = get_field('heading');
$heading_type = get_field('heading_type');
$description = get_field('description');
$button = get_field('button');
$secondary_button = get_field('second_button');
$invert_image = get_field('invert_image');

?>


<section class="c-container__sm pb-[62px] lg:pb-[80px] flex flex-col <?php if ($invert_image) : ?>md:flex-row-reverse<?php else : ?>md:flex-row<?php endif; ?> gap-11">
    <div class="md:w-1/2">
        <?php get_template_part('template-parts/components/image', '', array(
            'image_size' => 'large',
            'image_id' => $image,
            'image_class' => 'rounded-lg aspect-[1.36] object-cover w-full'
        )); ?>
    </div>
    <div class="md:w-1/2 grid place-content-center">
        <div class="md:max-w-[80%]">
            <<?= $heading_type ?? "h2" ?> class="h4"><?php echo esc_html($heading); ?></>
                <p class="body3"><?php echo esc_html($description); ?></p>
                <?php if ($button || $secondary_button) : ?>
                    <div class="flex gap-2">
                        <?php if ($button) : ?>
                            <?php get_template_part('template-parts/components/button', '', array(
                                'button' => $button,
                                'type' => 'primary',
                                'size' => 'medium',
                                'class' => 'mt-5 w-fit'
                            )); ?>
                        <?php endif; ?>
                        <?php if ($secondary_button) : ?>
                            <?php get_template_part('template-parts/components/button', '', array(
                                'button' => $secondary_button,
                                'type' => 'secondary',
                                'size' => 'medium',
                                'class' => 'mt-5 w-fit'
                            )); ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
        </div>

    </div>
</section>