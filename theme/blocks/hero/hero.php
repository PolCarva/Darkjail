<?php

$heading = get_field('heading');
$subheading = get_field('subheading');
$main_image = get_field('main_image');
$button = get_field('button');

$hero_id = uniqid('hero-');


?>

<section class="w-full h-svh bg-black relative">
    <div class="absolute top-0 left-0 w-full h-full bg-black opacity-50 z-0"></div>
    <div class="absolute text-white bottom-5 left-5 z-10">
        <h1 class="h1">
            <?php echo $heading; ?>
        </h1>
        <p><?php echo $subheading ?></p>
    </div>
</section>