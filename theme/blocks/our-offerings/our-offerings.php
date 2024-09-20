<?php

/**
 * Block Name: Our Offerings
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'pixa_our_offering-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "class_name" and "align" values.
$class_name = 'pixa_our_offerings';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load field(s) value.
$heading = get_field('heading') ?? 'Our Offerings';
$icon = get_field('icon');
$offerings = get_field('offerings'); // Repeater field for offerings

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
    <section class="px-5 md:px-10 bg-ice">
        <div class="container-fluid">
            <h2><?php echo esc_html($heading); ?></h2>
            <div class="offerings-grid">
                <?php if ($offerings): ?>
                    <?php foreach ($offerings as $index => $offering): ?>
                        <?php
                        // Extract fields
                        $title = $offering['title'] ?? '';
                        $description = $offering['description'] ?? '';
                        $link = $offering['link']['url'] ?? '#';
                        $is_featured = $offering['is_featured'] ?? false;
                        $recommended = $offering['recommended'] ?? false;

                        // Class for featured (first) card
                        $featured_class = ($is_featured && $index === 0) ? 'featured-card' : '';
                        ?>
                        <a href="<?php echo esc_url($link); ?>" class="offering-card <?php echo esc_attr($featured_class); ?>">
                            <div class="offering-card-header">
                                <h3><?php echo esc_html($title); ?></h3>
                                <?php if ($recommended): ?>
                                    <span class="tag">Recommended</span>
                                <?php endif; ?>
                            </div>
                            <p><?php echo esc_html($description); ?></p>
                            <span class="learn-more w-fit h-fit " aria-label="Learn more about <?php echo esc_attr($title); ?>">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1H28.6607V28.6607M1 28.6631L18.2656 11.3975" stroke="#221F20"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>

<style>
    .offerings {
        padding: 60px 0;
        background-color: #DBFCFC;
    }

    .offerings h2 {
        color: #221F20;
        font-family: Manrope;
        font-size: 40px;
        font-style: normal;
        font-weight: 600;
        line-height: 110%; /* 44px */
        margin-bottom: 48px;
    }

    .offerings-grid {
        display: grid;
        grid-template-columns: 1fr;
        grid-column-gap: 32px;
        grid-row-gap: 16px;
    }
    	
    .offering-card {
        grid-area: auto;
    }

    @media screen and (min-width: 1400px) {
        .offerings-grid {
            grid-template-columns: repeat(4, 1fr);
        }

        .featured-card {
            grid-area: 1 / 1 / 2 / 5;
        }
    
        .offering-card:nth-child(1) {
            grid-area: 1 / 1 / 2 / 3;
        }

        .offering-card:nth-child(2) {
            grid-area: 1 / 3 / 2 / 4;
        }

        .offering-card:nth-child(3) {
            grid-area: 1 / 4 / 2 / 5;
        }
    }

    .offering-card {
        width: 100%;
        height: 289px;
        flex-shrink: 0;
        border: 1px solid #D53538;
        padding: 30px;
        border-radius: 10px;
        position: relative;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        justify-content: start;
    }

    .offering-card-header {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: start;
    }

    .offering-card:hover {
        background-color: #fff;
        border: 1px solid #fff;
        transform: scale(1.03);
    }

    .offering-card h3 {
        color: #221F20;
        font-family: Manrope;
        font-size: 32px;
        font-style: normal;
        font-weight: 500;
        line-height: 120%; /* 38.4px */
        margin-bottom: 32px;
    }

    .offering-card p {
        color: rgba(34, 31, 32, 0.50);
        font-family: Manrope;
        font-size: 18px;
        font-style: normal;
        font-weight: 400;
        line-height: 140%; /* 25.2px */
        max-width: 70%;
    }

    .offering-card .tag {
        background-color: #D53538;
        padding: 5px 10px;
        border-radius: 20px;
        color: #FFF;
        text-align: center;
        font-family: "PP Mori";
        font-size: 14px;
        font-style: normal;
        font-weight: 600;
        line-height: 100%; /* 14px */
    }

    .offering-card .learn-more {
        position: absolute;
        bottom: 24px;
        right: 24px;
    }

    .offering-card:hover .learn-more svg path {
        stroke: #D53538;
    }

    /* Responsive styles */
    /* @media screen and (max-width: 1024px) {
        .offerings-grid {
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 16px;
        }

        .offering-card:nth-child(1),
        .offering-card:nth-child(2),
        .offering-card:nth-child(3) {
            grid-area: auto;
        }
    } */

    @media screen and (max-width: 768px) {
        .offering-card {
            justify-content: space-between;
        }

        .offerings {
            padding: 48px 0;
        }

        .offerings h2 {
            font-size: 36px;
            margin-bottom: 30px;
        }

        .offerings-grid {
            grid-template-columns: 1fr;
        }

        .offering-card:last-child {
            margin-bottom: 0;
        }

        .offerings h2 {
            color: #221F20;
            font-family: Manrope;
            font-size: 32px;
            font-style: normal;
            font-weight: 500;
            line-height: 120%; /* 38.4px */
        }

        .offering-card h3 {
            color: #221F20;
            font-family: Manrope;
            font-size: 26px;
            font-style: normal;
            font-weight: 600;
            line-height: 120%; /* 31.2px */
        }

        .offering-card p {
            color: rgba(34, 31, 32, 0.50);
            font-family: Manrope;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: 140%; /* 22.4px */
        }
    }

    @media screen and (max-width: 480px) {
        .offerings h2 {
            font-size: 30px;
        }

        .offering-card {
            padding: 20px;
        }

        .offering-card h3 {
            font-size: 24px;
            line-height: 30px;
        }
    }

    <?php if (isset($icon) && !empty($icon)) : ?>
    #
    <?php echo $id; ?>
    h2::before {
        content: '';
        background-image: url('<?php echo $icon; ?>');
        background-repeat: no-repeat;
        background-size: contain;
        display: block;
        height: 25px;
        margin: .5rem auto 1rem;
        width: 30px;
    }

    <?php endif; ?>
</style>