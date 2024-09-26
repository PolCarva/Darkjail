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

$heading_words = explode(' ', $heading);

$first_line_count = ceil(count($heading_words) / 2);

$first_line = implode(' ', array_slice($heading_words, 0, $first_line_count));
$second_line = implode(' ', array_slice($heading_words, $first_line_count));

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
<div class="bg-ice">
    <section id="<?= $hero_id ?>" class="w-full lg:h-[675px] lg:max-h-[calc(95svh-103px)] c-container">
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

            <div class="lg:absolute bottom-10 left-10 flex flex-col">
                <<?php echo $heading_type ?> class="heading h1 lg:my-0"><?php echo esc_html($first_line); ?> <br class="hidden lg:block">
                    <?php echo esc_html($second_line); ?>
                </<?php echo $heading_type ?>>
                <?php if (isset($subheading) && $subheading) : ?>
                    <p class="subheading my-0"><?php echo esc_html($subheading); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </section>

</div>

<style>
    #<?= $hero_id . " " ?>.heading,
    #<?= $hero_id . " " ?>.subheading {
        color: <?= $mobile_text_color ?> !important;
    }

    @media (min-width: 1024px) {

        #<?= $hero_id . " " ?>.heading,
        #<?= $hero_id . " " ?>.subheading {
            color: <?= $text_color ?> !important;
        }

    }
</style>