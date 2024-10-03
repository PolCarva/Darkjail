<?php

// Load values and assign defaults.
$heading          = get_field('heading') ?: 'Your first line here...';
$heading_second_line          = get_field('heading_second_line');
$heading_size    = get_field('heading_size') ?: 'h1';
$heading_type       = get_field('heading_type') ?: 'h1';
$subheading       = get_field('subheading');
$image            = get_field('image_options');
$content_styles   = get_field('content_styles');
$buttons         = get_field('buttons');
$tag             = get_field('tag');



get_template_part('template-parts/components/hero', '', array(
    'heading' => $heading,
    'heading_second_line' => $heading_second_line,
    'heading_size' => $heading_size,
    'heading_type' => $heading_type,
    'subheading' => $subheading,
    'image' => $image,
    'content_styles' => $content_styles,
    'buttons' => $buttons,
    'tag' => $tag,

));
