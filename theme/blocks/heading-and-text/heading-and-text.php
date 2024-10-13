<?php

$title = get_field('title');
$subtitle = get_field('subtitle');
$text = get_field('text');

$position = get_field('position') ?? 'left';
$text_align = get_field('text_align') ?? 'left';

$text_styles = '';

if ($position === 'right') {
    $text_styles .= ' justify-end';
} else if ($position === 'center') {
    $text_styles .= ' justify-center';
}

if ($text_align === 'right') {
    $text_styles .= ' text-right';
} else if ($text_align === 'center') {
    $text_styles .= ' text-center';
}

?>

<div class="c-container w-full h-full flex flex-col gap-1 <?= $text_styles ?>">
    <span class="subtitle-1 text-primary"><?php echo esc_html($subtitle) ?></span>
    <h2 class="text-white mb-4"><?php echo esc_html($title) ?></h2>
    <p class="text-gray"><?php echo esc_html($text) ?></p>
</div>