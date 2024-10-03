<?php
/*
Use example: 	

get_template_part('template-parts/components/hero', '', array(
    'heading' => "Don’t Youtube without us",
    'subheading' => "Pixability helps you deliver more of the impressions that matter",
    'image' => array(
        'main_image' => 14198,
        'mobile_image' => false,
    ),
    'content_styles' => array(
        'text_color' => '#FFEA7B',
        'mobile_text_color' => '#D53538',
    ),
    'heading_type' => 'h1',
);


*/
// Extract the variables from the array
extract($args);

$first_line = $heading;
$second_line = $heading_second_line;

$background_video = $image['background_video'];

$main_image = $image['main_image'];
$mobile_image = $image['mobile_image'];


$content_styles = $content_styles ?? array(
    'text_color' => '#FFEA7B',
    'mobile_text_color' => '#D53538',
);
$text_color = $content_styles['text_color'];
$mobile_text_color = $content_styles['mobile_text_color'];

$hero_id = uniqid('hero-');

?>
<div class="bg-ice pb-[30px] lg:pb-[80px]">
    <section id="<?= $hero_id ?>" class="w-full xl:h-[675px] xl:max-h-[calc(95svh-113px)] c-container">
        <div class="relative size-full flex flex-col gap-5">
            <div class="w-full bg-cover rounded-2xl overflow-hidden aspect-video">
                <?php if (!empty($background_video)) : ?>
                    <?php
                    $video_url = wp_get_attachment_url($background_video);
                    if ($video_url) :
                    ?>
                        <video class="w-full h-full object-cover" autoplay muted loop>
                            <source src="<?= esc_url($video_url); ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    <?php endif; ?>

                <?php else : ?>
                    <?php
                    get_template_part('template-parts/components/image', '', array(
                        'image_id' => $main_image,
                        'mobile_image_id' => $mobile_image,
                        'image_size' => 'extra-large',
                        'image_class' => 'object-cover w-full h-full',
                        'image_position' => 'center'
                    ));
                    ?>
                <?php endif; ?>
            </div>

            <div class="xl:absolute bottom-10 left-10 flex flex-col">
                <?php if (isset($tag) && $tag) : ?>
                    <p class="tag !mb-[14px] font-pp-mori text-[14px] font-semibold !mt-0"><?= esc_html($tag); ?></p>
                <?php endif; ?>
                <<?php echo $heading_type ?> class="heading <?= $heading_size; ?> mb-[11px] !mt-0"><?php echo esc_html($first_line); ?> <br class="hidden xl:block">
                    <?php echo esc_html($second_line); ?>
                </<?php echo $heading_type ?>>
                <?php if (isset($subheading) && $subheading) : ?>
                    <p class="subheading !mb-[28px] !mt-0"><?php echo esc_html($subheading); ?></p>
                <?php endif; ?>
                <?php if (isset($buttons) && $buttons) : ?>
                    <div class="flex flex-col sm:flex-row gap-4 items-start sm:items-center">
                        <?php foreach ($buttons as $index) :
                            $button = $index['button'];

                            $button_args = array(
                                'type' => $button['variant'],
                                'size' => 'medium',
                                'button' => array(
                                    'text' => $button['text'],
                                    'size' => 'medium',
                                    'url' => $button['link'],
                                    'target' => '_self',
                                    'container_class' => '!w-full sm:!w-fit',
                                    'custom_class' => '!w-full sm:!w-fit text-center justify-center',
                                )
                            );

                            get_template_part('template-parts/components/button', '', $button_args);
                        endforeach; ?>
                    </div>
                <?php endif; ?>


            </div>
        </div>
    </section>

</div>

<style>
    #<?= $hero_id . " " ?>.heading,
    #<?= $hero_id . " " ?>.subheading,
    #<?= $hero_id . " " ?>.tag {
        color: <?= $mobile_text_color ?> !important;
    }

    @media (min-width: 1280px) {

        #<?= $hero_id . " " ?>.heading,
        #<?= $hero_id . " " ?>.subheading,
        #<?= $hero_id . " " ?>.tag {
            color: <?= $text_color ?> !important;
        }

    }
</style>