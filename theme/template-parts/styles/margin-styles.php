<?php
/*
Use example:
		get_template_part('template-parts/styles/margin-styles', '',
		array(
				'section_id' => 'hero-e09db7cb9430',
				'margin_bottom' => '90',
				'margin_bottom_mobile' => 30,
		));
*/

// Extract the variables from the array
extract($args);

$section_id = $section_id;
$margin_bottom = get_field('margin_bottom') ?? 80;
$margin_bottom_mobile = get_field('margin_bottom_mobile') ?? 30;
$margin_top = get_field('margin_top') ?? 0;
$margin_top_mobile = get_field('margin_top_mobile') ?? 0;

$padding_bottom = get_field('padding_bottom') ?? 0;
$padding_bottom_mobile = get_field('padding_bottom_mobile') ?? 0;
$padding_top = get_field('padding_top') ?? 0;
$padding_top_mobile = get_field('padding_top_mobile') ?? 0;

?>
<style>
    #<?= $section_id ?> {
        margin-bottom: <?= $margin_bottom_mobile ?>px;
        margin-top: <?= $margin_top_mobile ?>px;
        padding-bottom: <?= $padding_bottom_mobile ?>px;
        padding-top: <?= $padding_top_mobile ?>px;
        <?php if ($margin_top_mobile < 0 || $margin_top < 0): ?>
            position: relative;
        <?php endif; ?>
    }

    @media screen and (min-width: 768px) {
        #<?= $section_id ?> {
            margin-bottom: <?= $margin_bottom ?>px;
            margin-top: <?= $margin_top ?>px;
            padding-bottom: <?= $padding_bottom ?>px;
            padding-top: <?= $padding_top ?>px;
            
        }
    }
</style>