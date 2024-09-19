<?php

// Load values and assign defaults.
$heading          = get_field('heading') ?: 'Your heading here...';
$subheading       = get_field('subheading') ?: 'Your subheading here...';
$image            = get_field('main_image');
$button           = get_field('button');
$right_align      = get_field('right_align');
$desktop_full_width = get_field('desktop_full_width');
$heading_type       = get_field('heading_type');


get_template_part('template-parts/components/hero', '', array(
    'heading' => $heading,
    'subheading' => $subheading,
    'image' => $image,
    'button' => $button,
    'right_align' => $right_align,
    'desktop_full_width' => $desktop_full_width,
    'heading_type' => $heading_type
));
