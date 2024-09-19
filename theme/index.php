<?php
global $wp_query;

$args = [
  'title' => 'Welcome to my Blog',
  'posts' => $wp_query->get_posts(),
];

get_header();
get_template_part('template-parts/views/posts', '', $args);
get_footer();
