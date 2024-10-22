<?php
$background_image = get_field('background_image');
$background_image_mobile = get_field('background_image_mobile');

$overlay = get_field('overlay') ?? 0.5;

$broken_paper = get_field('broken_paper') ?? false;
$broken_paper_up = get_field('broken_paper_up') ?? true;
$broken_paper_down = get_field('broken_paper_down') ?? false;


if ($background_image) {
    $background_image_url = esc_url($background_image['url']);
} else {
    $background_image_url = '';
}

if ($background_image_mobile) {
    $background_image_mobile_url = esc_url($background_image_mobile['url']);
} else {
    $background_image_mobile_url = $background_image_url;
}

$block_id = 'background-image-' . uniqid();
?>
<div id="<?= $block_id ?>">
    <section class="background-section relative py-10">
        <?php if ($broken_paper) :  ?>
            <?php if ($broken_paper_up) : ?>
                <div class="absolute -top-2.5 z-[1] h-20 bg-fill w-full" style="background-image: url('https://darkjail.com/wp-content/uploads/2024/10/rotura_papel.png');"></div>
            <?php endif ?>
            <?php if ($broken_paper_down) : ?>
                <div class="absolute -bottom-2.5 rotate-180 z-[1] h-20 bg-fill w-full" style="background-image: url('https://darkjail.com/wp-content/uploads/2024/10/rotura_papel.png');"></div>
            <?php endif ?>
        <?php endif ?>
        <div class="block md:hidden absolute inset-0 bg-cover bg-center z-[0]" style="background-image: url('<?php echo $background_image_mobile_url; ?>');">
            <div class="absolute bg-black inset-0" style="opacity: <?= $overlay ?>;"></div>
        </div>

        <div class="hidden md:block absolute inset-0 bg-cover bg-center z-[-1]" style="background-image: url('<?php echo $background_image_url; ?>');">
            <div class="absolute bg-black inset-0" style="opacity: <?= $overlay ?>;"></div>
        </div>

        <div class="relative z-10 p-5 md:p-8">
            <InnerBlocks />
        </div>
        <?php
        get_template_part('template-parts/styles/margin-styles', '', array(
            'section_id' => $block_id,
        ));
        ?>
    </section>


</div>