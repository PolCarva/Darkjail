<?php
$background_image = get_field('background_image');
$background_image_mobile = get_field('background_image_mobile');

$broken_paper = get_field('broken_paper') ?? false;


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
<section class="background-section relative pt-10" id="<?= $block_id ?>">
    <?php if ($broken_paper) :  ?>
        <div class="absolute -top-2.5 z-[1] h-20 bg-fill w-full" style="background-image: url('https://darkjail.com/wp-content/uploads/2024/10/rotura_papel.png');"></div>
    <?php endif ?>
    <div class="block md:hidden absolute inset-0 bg-cover bg-center z-[0]" style="background-image: url('<?php echo $background_image_mobile_url; ?>');"></div>

    <div class="hidden md:block absolute inset-0 bg-cover bg-center z-[-1]" style="background-image: url('<?php echo $background_image_url; ?>');"></div>

    <div class="relative z-10 p-8">
        <InnerBlocks />
    </div>

</section>

<svg width="100%" height="0" viewBox="0 0 1920 179" fill="none" xmlns="http://www.w3.org/2000/svg">
    <clipPath id="mask-t-<?php echo $block_id; ?>">
        <path d="M22.5 19.5H0.5V3448.5H1920V31.5L1876.5 30L1757.5 10.5H1724L1708 14.5L1690 18L1689 19.5L1660.5 23L1634 39.5L1569 42.5L1557 47.5L1552.5 46.5L1550 49L1542.5 46.5L1537 45.5H1528.5L1526 40L1523 39.5L1520.5 35.5L1502.5 23L1425 15L1401 14.5L1392.5 19.5L1383.5 23H1369.5L1355.5 27.5H1346L1334.5 22.5L1328.5 23H1320.5L1305.5 31L1293.5 35L1285 32.5L1281.5 33L1275 30.5L1259 28L1245.5 31.5L1239 30.5L1218 23L1209.5 24.5L1178.5 22H1168.5L1164.5 19.5L1153.5 16.5L1134.5 16L1129.5 18L1110.5 8.5L1095.5 7.5L1080 2L1072.5 7.5L1062.5 9.5L1053.5 14L1020.5 13.5L1008 9.5L992 13L958 18L939.5 24.5L919.5 21.5L892 14.5L862.5 20L815.5 14.5L793.5 15L756 8.5L729.5 9L703 4L679.5 1L627 14H565L552.5 10H548L543 12H538.5L530.5 13H498L484 11.5L472.5 15.5L459.5 18L448 15L437.5 18.5L432.5 22L424 23.5L419 26.5H405.5L402 28L391.5 31L383 30.5L367 25.5L355 27L344 33L335 36L329 38.5L320.5 35L316.5 36L309 33.5L294 31L282 35L269 32.5L253 26.5L234.5 28.5L212.5 26L201.5 23.5H196L187.5 17.5L185.5 20H175.5L169.5 18.5L166.5 21L155 15.5L143.5 10.5L137 11.5L130.5 11L118.5 6L114 8L100 13.5L93 16L79.5 19.5L67 16H53L42 13.5L22.5 19.5Z" stroke="black" />
    </clipPath>

</svg>


<style>
    #<?php echo $block_id; ?> {
        clip-path: url(#mask-t-<?php echo $block_id; ?>);
    }
  
</style>