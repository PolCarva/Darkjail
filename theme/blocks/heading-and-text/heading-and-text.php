<?php

$title = get_field('title');
$subtitle = get_field('subtitle');
$text = get_field('text');

$heading_tag = get_field('heading_tag') ?? 'h2';

$remove_padding = get_field('remove_padding') ?? false;

$position = get_field('position') ?? 'left';
$text_align = get_field('text_align') ?? 'left';

$text_color = get_field('text_color') ?? "#959595";

$text_styles = '';


if ($position === 'right') {
    $text_styles .= ' justify-end';
} else if ($position === 'center') {
    $text_styles .= ' justify-center';
} else {
    $text_styles .= ' justify-start';
}

if ($text_align === 'right') {
    $text_styles .= ' text-right';
} else if ($text_align === 'center') {
    $text_styles .= ' text-center';
} else {
    $text_styles .= ' text-left max-w-[80%]';
}

$block_id = 'heading-and-text-' . uniqid();

?>

<div id="<?= $block_id ?>" class="w-full h-fit flex flex-col gap-1 <?= $text_styles ?> <?php echo $remove_padding ? '' : 'c-container ' ?>">
    <span class="subtitle-1 text-primary"><?php echo esc_html($subtitle) ?></span>
    <<?= $heading_tag ?> class="text-white mb-4"><?php echo esc_html($title) ?></<?= $heading_tag ?>>
    <p style="color: <?= $text_color ?>"><?php echo esc_html($text) ?></p>
    <?php
    get_template_part('template-parts/styles/margin-styles', '', array(
        'section_id' => $block_id,
    ));
    ?>
</div>