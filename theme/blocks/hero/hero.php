<?php

$heading = get_field('heading');
$second_line_heading = get_field('second_line_heading');
$subheading = get_field('subheading');
$main_image = get_field('main_image');
$mobile_image = get_field('mobile_image');
$button = get_field('button');

$next_date = get_field('next_date', "options");


$hero_id = uniqid('hero-');

?>

<section class="w-full h-[70svh] relative grid">
    <div class="c-container">
        <div class="absolute top-0 left-0 w-full h-full py-10 z-10"></div>
        <div class="absolute text-white left-0 h-[85%] c-container flex flex-col gap-2 justify-end z-10">
            <h1 class="h1 flex flex-col text-white">
                <?php echo $heading; ?>
                <span class="block"><?php echo $second_line_heading; ?></span>
            </h1>

            <p class="mb-3">
                <?php echo $subheading ?>
            </p>
            <?php if ($button) {
                get_template_part('template-parts/components/button', '', array(
                    'type' => $button['button_type'],
                    'size' => 'medium',
                    'button' => [
                        'text' => $button['text'],
                        'url' => $button['url'],
                        'target' => '_self',
                    ],
                ));
            }
            ?>
        </div>
    </div>
    <div class="absolute shadow-[10px_10px_0px_#FF6400] bg-white py-5 right-4 md:right-5 lg:right-20 bottom-0 translate-y-1/2 c-container flex flex-col gap-2 justify-end z-10">

        <h2 class="h1 text-black text-center"><?= $next_date; ?></h2>
        <p class="h5 text-black uppercase text-center">PRÓXIMA FECHA</p>
    </div>

    <?php if ($main_image) {
        get_template_part('template-parts/components/image', '', array(
            'image_id' => $main_image,
            'mobile_image_id' => $mobile_image,
            'image_class' => 'absolute inset-0 w-full h-full object-cover',
            'image_size' => 'extra-large',
        ));
    }
    ?>


</section>