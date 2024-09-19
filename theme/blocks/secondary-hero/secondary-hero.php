<?php

// Load values and assign defaults.
$heading              = get_field('heading') ?: 'Your heading here...';
$subheading           = get_field('subheading') ?: 'Your subheading here...';
$image                = get_field('main_image');
$button               = get_field('button');
$right_align          = get_field('right_align');
$gradient_start_color = get_field('gradient_start_color');
$gradient_end_color   = get_field('gradient_end_color');
$gradient_angle       = get_field('gradient_angle');
$show_sub_banner      = get_field('show_sub-banner');
$second_heading       = get_field('second_heading');
$second_button        = get_field('second_button');

get_template_part('template-parts/components/secondary-hero', '', array(
    'heading' => $heading,
    'subheading' => $subheading,
    'image' => $image,
    'button' => $button,
    'right_align' => $right_align,
    'gradient_start_color' => $gradient_start_color,
    'gradient_end_color' => $gradient_end_color,
    'gradient_angle' => $gradient_angle,
    'show_sub_banner' => $show_sub_banner,
    'second_heading' => $second_heading,
    'second_button' => $second_button,
));
