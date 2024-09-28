<?php

/**
 * Block Name: Featured Posts (Fresh PIX)
 */

$id = 'pixa_featured_posts-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$class_name = 'pixa_featured_posts';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

$section_title = get_field('section_title') ?? 'Fresh Pix';
?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?> pb-[102px] bg-ice">
    <div class="c-container__sm">
        <h2 class="h4 !my-0 !pb-[16px] lg:!pb-[48px]"><?= $section_title ?></h2>
        <div class="flex flex-col justify-between md:flex-row gap-[44px]">
            <?php
            if (have_rows('pixa_fp_posts')) :
                while (have_rows('pixa_fp_posts')) : the_row();
                    $post = get_sub_field('post');
                    $image = get_sub_field('image');
                    $post_type = get_post_type_object($post->post_type);
                    $post_type = $post_type->labels->singular_name;
                    if ($post_type == 'Post') {
                        $post_type = 'Blog';
                    }
            ?>
                    <div class="border overflow-hidden flex-1 h-full bg-transparent transition-colors rounded-[14px] border-solid border-black group">
                        <div class="h-[200px]">
                            <?php if (has_post_thumbnail($post->ID)): ?>
                                <?php echo get_the_post_thumbnail($post->ID, 'large', ['class' => 'size-full object-cover']); ?>
                            <?php elseif ($image): ?>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($post->post_title); ?>" class="pixa-fp-card-img-top">
                            <?php endif; ?>
                        </div>
                        <div class="h-full flex flex-col justify-between min-h-[264px] p-5 lg:p-[33px] lg:pt-[24px] items-start">
                            <div class='flex flex-col items-start'>
                                <p class="subtitle2 text-cherry"><?php echo esc_html($post_type); ?> | <?php echo get_the_date('F j, Y', $post->ID); ?></p>
                                <h3 class="body1 decoration-1 underline-offset-[1.8px] group-hover:underline under line-clamp-4"><?php echo esc_html($post->post_title); ?></h3>
                            </div>
                            <div class="w-full flex justify-between items-center">
                                <?php
                                get_template_part('template-parts/components/button', '', array(
                                    'type' => 'primary',
                                    'size' => 'medium',
                                    'button' => [
                                        'text' => 'Read More',
                                        'url' => [
                                            'url' => get_permalink($post->ID),
                                            'target' => '_self',
                                        ],
                                    ],
                                ));
                                ?>
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path class="transition group-hover:stroke-cherry" d="M1 1L28.6607 1V28.6607" stroke="#221F20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path class="transition group-hover:stroke-cherry" d="M1 28.6631L18.2656 11.3975" stroke="#221F20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                    </div>
            <?php
                endwhile;
            endif;
            ?>
        </div>
    </div>
</section>
