<?php

$heading = get_field('heading');
$second_line_heading = get_field('second_line_heading');
$subheading = get_field('subheading');
$main_image = get_field('main_image');
$mobile_image = get_field('mobile_image');
$buttons = get_field('buttons');

$next_date = get_field('next_date', "options");


$hero_id = uniqid('hero-');

?>

<section class="w-full min-h-[65svh] md:min-h-[50svh] lg:min-h-[70svh] grid relative mb-24 md:mb-20">
    <div class="relative z-20 c-container w-full h-full">
        <div class="absolute text-white left-0 items-end bottom-20 px-4 md:px-5 lg:px-20">
            <h1 class="h1 flex flex-col text-white">
                <?php echo $heading; ?>
                <span class="block"><?php echo $second_line_heading; ?></span>
            </h1>

            <div class="my-3 [&_p]:text-[20px] [&_p]:lg:text-[30px] [&_p]:font-normal [&_p]:leading-none [&_p]:tracking-normal [&_p]:font-teko ">
                <?php echo $subheading ?>
            </div>

            <?php if ($buttons) { ?>
                <div class="flex flex-col md:flex-row items-center mt-5 gap-4">
                    <?php foreach ($buttons as $index) {
                        $button = $index['button'];
                        $button_text = $button['text'];
                        $button_link = $button['link'];
                        $button_type = $button['type'];

                        get_template_part('template-parts/components/button', '', array(
                            'type' => $button_type,
                              'size' => 'medium',
                            'button' => array(
                              'text' => $button_text,
                              'url' => $button_link,
                              'custom_class' => '',
                              'container_class' => '',
                            )
                          ));
                          
                    }

                    ?>
                </div>
            <?php } ?>

        </div>
        <div class="absolute shadow-[10px_10px_0px_#FF6400] sm:w-auto px-10 w-max bg-white py-5 right-5 lg:right-20 md:py-5 md:px-20 bottom-0 translate-y-1/2 flex flex-col gap-2 justify-end z-20">

            <h2 class="h1 !text-[24px] lg:!text-[30px] md:!text-[30px] text-black text-center"><?= $next_date; ?></h2>
            <p class="h5 text-black uppercase text-center">PRÓXIMA FECHA</p>
        </div>
    </div>
    <div class="bg-black/20 absolute inset-0 z-10"></div>
    <?php if ($main_image) {
        get_template_part('template-parts/components/image', '', array(
            'image_id' => $main_image,
            'mobile_image_id' => $mobile_image,
            'image_class' => 'absolute z-0 inset-0 w-full h-full object-cover',
            'image_size' => 'extra-large',
        ));
    }
    ?>


</section>

