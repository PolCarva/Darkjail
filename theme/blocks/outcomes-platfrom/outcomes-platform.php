<?php

/**
 * Block Name: Outcomes Platform
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'pixa_outcomes_platform-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "class_name" and "align" values.
$class_name = 'pixa_outcomes_platform';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

$block_id = esc_attr($id);

$cards = get_field('cards');
$section_title = get_field('section_title');

/* Split section title in half */
if ($section_title) {
    $words = explode(' ', $section_title);
    $total_words = count($words);
    $half_index = ceil($total_words / 2);

    $first_half = implode(' ', array_slice($words, 0, $half_index));
    $second_half = implode(' ', array_slice($words, $half_index));
}
?>

<style>
    #<?php echo $block_id  . " " ?>.pixa-outcomes-platform__card-list {
        background-image: url('<?php bloginfo('template_url') ?>/src/img/bg-shapes-mobile.png');
        background-size: 100% 100%;
        background-repeat: no-repeat;
        background-position: center;
    }

    @media (min-width: 1024px) {
        #<?php echo $block_id . " " ?>.pixa-outcomes-platform__card-list {
            background-image: url('<?php bloginfo('template_url') ?>/src/img/bg-shapes.png');
        }
    }
</style>
<div id="<?php echo esc_attr($id); ?>" class="bg-ice pb-[100px] lg:pb-[155px] <?php echo esc_attr($class_name); ?>">
    <section class="c-container">
        <div>
            <div class="relative lg:h-fit h-auto bg-white w-full overflow-hidden rounded-[14px]">
                <h2 class="h4 absolute z-10 m-0 left-5 lg:left-11 top-[34px]"><?= esc_html($first_half ?? "") ?> <br> <?= esc_html($second_half ?? "") ?></h2>
                <div class="pixa-outcomes-platform__card-list w-full h-full flex flex-col mt-10 lg:flex-row lg:mt-0">
                    <?php if ($cards): ?>
                        <?php foreach ($cards as $index => $card): ?>
                            <?php
                            // Get values from the repeater fields
                            $title = $card['title'];
                            $subtitle = $card['subtitle'];
                            $description = $card['description'];
                            $is_white = $card['is_white'];
                            $words = explode(' ', $title);
                            $first_word = array_shift($words);

                            $rest_of_title = implode(' ', $words);
                            $aos_delay = $index * 100;
                            ?>
                            <div data-aos="fade-up" data-aos-offset="500" data-aos-delay="<?= $aos_delay ?>" class="w-full h-[560px] lg:h-fit lg:pt-[20rem] xl:pt-[16.5rem] relative flex flex-col justify-end first:lg:pl-11 first:lg:w-11/12 p-5">

                                <div class="relative z-[1] flex flex-col justify-between md:h-[370px] max-h-[80%] lg:h-fit pb-5">
                                    <div class="shrink-0 mb-[55px]">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="76" height="76" viewBox="0 0 76 76" fill="none">
                                            <circle cx="38" cy="38" r="38" fill="white" />
                                            <path d="M37.5605 18L57.1196 37.559L37.5605 57.1181" stroke="#221F20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M17.9999 37.5608H42.4171" stroke="#221F20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="flex flex-col grow">
                                        <h3 class="h5 <?php echo $is_white ? 'text-white' : 'text-black'; ?>">
                                            <?php echo esc_html($first_word); ?> <br> <?php echo esc_html($rest_of_title); ?>
                                        </h3>
                                        <h2 class="h2 lg:text-[42px] xl:text-[50px] <?php echo $is_white ? 'text-white' : 'text-black'; ?>"><?= $subtitle ?></h2>
                                        <p class="max-w-[70%] body2 line-clamp-6 lg:line-clamp-4 <?php echo $is_white ? 'text-white' : 'text-black'; ?>"><?= $description ?> </p>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>