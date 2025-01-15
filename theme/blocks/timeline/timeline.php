<?php
$items = get_field('items') ?? [];
$block_id = 'timeline-' . uniqid();
$content_max_width = get_field('content_max_width') ?? false;

$styles = '';

if ($content_max_width) {
    $styles .= ' w-full md:max-w-[80%] ';
}


if (!function_exists('get_year')) {
    function get_year($date)
    {
        return date('Y', strtotime($date));
    }
}
?>

<div id="<?= esc_attr($block_id) ?>" class=" <?= $styles ?>">
    <section class="relative w-full border-l-2 border-primary" data-aos="fade-in">
        <?php foreach ($items as $index => $item) :
            $delay = $index * 100;
        ?>
            <div class="pl-2">
                <div>
                    <h4 class="flex gap-2 items-center">
                        <span class="h-0.5 w-3 md:w-5 bg-primary" data-aos="fade-in"></span>
                        <span data-aos="fade-right" data-aos-delay="<?= $delay ?>"><?= esc_html(get_year($item['date'])) ?></span>
                        <div data-aos="fade-right" data-aos-delay="<?= $delay ?>">
                            <?= esc_html($item['title']) ?>
                        </div>
                    </h4>
                    <p class="pl-5 md:pl-7 text-black-400" data-aos="fade-right" data-aos-delay="<?= $delay + 100 ?>"><?= esc_html($item['description']) ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </section>

    <?php
    get_template_part('template-parts/styles/margin-styles', '', array(
        'section_id' => $block_id,
    ));
    ?>
</div>