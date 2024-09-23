<?php

/**
 * Block Name: Case Studies
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'pixa_case_studies-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "class_name" and "align" values.
$class_name = 'pixa_case_studies';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load field(s) value.
$heading = get_field('pixa_heading');
$case_studies = get_field('case_studies');
?>
<div id="<?php echo esc_attr($id); ?>" class="bg-ice <?php echo esc_attr($class_name); ?>">
    <section class="case-studies">
        <div class="c-container__sm">
            <h2><?php echo esc_html($heading); ?></h2>
            <div class="case-studies-grid">
                <?php if ($case_studies): ?>
                    <?php foreach ($case_studies as $index => $case_study): ?>
                        <?php
                        // Get values from the repeater fields
                        $title = $case_study['title'];
                        $tag = $case_study['tag'];
                        $image_id = $case_study['image'];
                        $image_url = wp_get_attachment_image_url($image_id, 'full');
                        $link = $case_study['link'] ?? '#';
                        ?>
                        <div class="column <?php echo ($index === 0) ? 'column-large' : 'column-small'; ?>">
                            <a class="case-study-card <?php echo ($index === 0) ? 'large' : 'small'; ?>" href="<?= $link ?>">
                                <img src="<?php echo esc_url($image_url); ?>" alt="">
                                <div class="card-content">
                                    <?php if ($tag): ?>
                                        <span class="tag"><?php echo esc_html($tag); ?></span>
                                    <?php endif; ?>
                                    <h3><?php echo esc_html($title); ?></h3>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>


<style type="text/css">
    .case-studies {
        padding: 60px 0;
        background-color: #DBFCFC;
    }

    .case-studies h2 {
        color: #221F20;
        font-family: Manrope;
        font-size: 40px;
        font-style: normal;
        font-weight: 600;
        line-height: 110%;
        /* 44px */
        margin-bottom: 48px;
    }

    .case-studies-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-template-rows: 1fr 1fr;
        grid-gap: 32px;
    }

    .column-large {
        grid-column: 1 / 2;
        grid-row: 1 / 3;
        height: 100%;
    }

    .column-small {
        grid-column: 2 / 3;
    }

    .case-study-card {
        position: relative;
        border-radius: 10px;
        overflow: hidden;
        text-decoration: none;
        color: inherit;
        display: block;
        transition: transform 0.3s ease;
    }

    .case-study-card:hover {
        transform: scale(1.03);
        z-index: 1;
    }

    .case-study-card.large {
        height: 100%;
    }

    .case-study-card.small {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .case-study-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.3s ease;
    }

    .case-study-card.small img {
        aspect-ratio: 2 / 1;
        /* Mantiene proporción 2:1 para las imágenes pequeñas */
    }

    .case-study-card:hover img {
        transform: scale(1.03);
    }

    .card-content {
        display: flex;
        flex-direction: column;
        gap: 16px;
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 24px;
        background: rgb(255, 255, 255);
        transition: background 0.3s ease;
    }

    .tag {
        color: #D53538;
        font-family: Manrope;
        font-size: 16px;
        font-style: normal;
        font-weight: 600;
        line-height: 100%;
        /* 16px */
        padding: 8px 0;
    }

    .case-study-card h3 {
        color: #221F20;
        font-family: Manrope;
        font-size: 24px;
        font-style: normal;
        font-weight: 500;
        line-height: 130%;
        /* 31.2px */
        margin: 0;
        max-width: 80%;
    }

    /* Ajustes responsivos */
    @media (max-width: 768px) {
        .case-studies-grid {
            grid-template-columns: 1fr;
            grid-template-rows: auto;
        }

        .column-large {
            grid-column: auto;
            grid-row: auto;
        }

        .column-small {
            grid-column: auto;
        }

        .case-studies h2 {
            font-size: 32px;
            margin-bottom: 16px;
        }

        .case-study-card h3 {
            font-size: 20px;
            line-height: 140%;
            /* 28px */
        }
    }
</style>