<?php

$block_id =  uniqid("latest-posts-");
$posts = get_field('posts');
?>

<section id="<?php echo esc_attr($block_id); ?>">
    <div class="c-container__sm">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-[44px]">
            <?php
            if (have_rows('posts')):
                while (have_rows('posts')) : the_row();
                    $post = get_sub_field('post');
                    $image = get_sub_field('image');
                    $title = $post->post_title;

            ?>
                    <a class="!no-underline group" href="<?php echo (get_permalink($post->ID)) ?>"
                        class="overflow-hidden flex-1 h-full bg-transparent flex flex-col group">
                        <div href="<?php echo (get_permalink($post->ID)) ?>">
                            <?php if ($image): ?>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($post->post_title); ?>"
                                    class="w-full aspect-[1/1] h-full object-cover">
                            <?php elseif (has_post_thumbnail($post->ID)): ?>
                                <?php echo get_the_post_thumbnail($post->ID, 'large', ['class' => 'aspect-[1/1] object-cover w-full']); ?>
                            <?php endif; ?>
                        </div>
                        <div
                            class="flex flex-col justify-between items-start flex-1 mt-5">
                            <div class='flex justify-between w-full gap-4 pb-2'>
                                <p class="subtitle-2 relative group-hover:before:w-full before:w-[0%] before:transition-all before:duration-300 before:absolute before:bottom-0 before:h-px before:bg-primary text-primary uppercase line-clamp-2">
                                    <?= esc_html($post->post_title); ?>
                                </p>
                                <sapn class="subtitle-2 text-white">
                                    <?php echo get_the_date('d/m/y', $post->ID); ?>
                                </sapn>

                            </div>
                            <p class="text-gray transition line-clamp-3 group-hover:text-white">
                                <?php if ($post->post_excerpt) : ?>
                                    <?= esc_html($post->post_excerpt); ?>
                                <?php else : ?>
                                    <?= wp_trim_words($post->post_content, 20); ?>
                                <?php endif; ?>
                            </p>
                        </div>
                    </a>
            <?php
                endwhile;
            endif;
            ?>
        </div>
    </div>
    <?php
    get_template_part('template-parts/styles/margin-styles', '', array(
        'section_id' => $block_id,
    ));
    ?>
</section>