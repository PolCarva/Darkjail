<?php

$button_url  = get_field('button_url');
$button_text = get_field('button_label');
$button_type = get_field('button_type');
$button_size = get_field('button_size');

get_template_part('template-parts/components/button', '', array(
  'type' => $button_type,
	'size' => $button_size,
  'button' => array(
    'text' => $button_text,
    'url' => $button_url,
    'custom_class' => '!mx-8',
    'container_class' => 'inline custom-container',
  )
));
