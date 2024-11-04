<?php
$shortcode = get_field('shortcode');
$link_to_all = get_field('link_to_all');

$block_id = 'image-' . uniqid();
?>
<div id="<?= $block_id ?>">
    <section class="c-container__sm flex flex-col">
        <?php if (isset($link_to_all) && $link_to_all) : ?>
            <a class="h4 self-end mb-5 !no-underline relative hover:text-primary-700 !text-primary 
        before:absolute before:bottom-1 before:left-0 before:h-px before:bg-primary before:w-0 
        before:transition-[width] before:duration-300 hover:before:w-full"
                href="<?= $link_to_all ?>" target="_blank">VER TODAS</a>
        <?php endif ?>
        <div <?php if ($is_preview) : ?> class="bg-gray-500" <?php endif; ?>>
            <?php echo do_shortcode($shortcode); ?>
        </div>


    </section>
    <?php
    get_template_part('template-parts/styles/margin-styles', '', array(
        'section_id' => $block_id,
    ));
    ?>
</div>