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
?>

<style>
#<?php echo $block_id ?> .pixa-outcomes-platform__card-list {
    background-image: url('<?php bloginfo('template_url') ?>/src/img/bg-shapes-mobile.png');
    background-size: 100% 100%;
    background-repeat: no-repeat;
    background-position: center;
}
@media (min-width: 1310px) {
    #<?php echo $block_id ?> .pixa-outcomes-platform__card-list {
        background-image: url('<?php bloginfo('template_url') ?>/src/img/bg-shapes.png');
    }
}
</style>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
    <section class="pixa-outcomes-platform py-16 px-5 md:px-10">
        <div class="container-fluid ">
            <div class="pixa-outcomes-platform__banner-container">
                <h1 class="pixa-outcomes-platform__title">The YouTube <br>Outcome Platform</h1>
                <div class="pixa-outcomes-platform__card-list" style="">
                    <div class="pixa-outcomes-platform__card">
                        <!-- <svg class="pixa-outcomes-platform__card-background" viewBox="0 0 1344 634" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M-504.98 693.691C-507.139 943.281 -329.798 1149.16 -105.576 1157.39C120.959 1162.87 308.787 963.337 313.722 711.347C313.722 707.918 313.722 704.49 313.722 701.062V271.65C312.951 244.908 326.984 220.566 349.036 210.11L1251.78 -258.557C1307.45 -287.699 1343.38 -349.582 1344 -417.979V-1163.66C1343.38 -1216.29 1304.52 -1258.63 1257.18 -1257.95C1245.31 -1257.95 1233.74 -1254.86 1222.95 -1249.55L-357.247 -410.437C-447.46 -363.982 -504.98 -263.357 -504.98 -152.961V693.519" fill="currentColor" fill-opacity="0.1"/>
                        </svg> -->
                        <div class="pixa-outcomes-platform__card-wrapper">
                            <div class="pixa-outcomes-platform__card-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="76" height="76" viewBox="0 0 76 76" fill="none">
                                    <circle cx="38" cy="38" r="38" fill="white"/>
                                    <path d="M37.5605 18L57.1196 37.559L37.5605 57.1181" stroke="#221F20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M17.9999 37.5608H42.4171" stroke="#221F20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="pixa-outcomes-platform__card-content">
                                <h3 class="pixa-outcomes-platform__card-subtitle">Deepest<br> Data</h3>
                                <h2 class="pixa-outcomes-platform__card-title">30,000X</h2>
                                <p class="pixa-outcomes-platform__card-description">More data than is available to agencies and brands</p>
                            </div>
                        </div>
                    </div>
                    <div class="pixa-outcomes-platform__card">
                        <!-- <svg class="pixa-outcomes-platform__card-background" viewBox="0 0 1344 634" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M-504.98 693.691C-507.139 943.281 -329.798 1149.16 -105.576 1157.39C120.959 1162.87 308.787 963.337 313.722 711.347C313.722 707.918 313.722 704.49 313.722 701.062V271.65C312.951 244.908 326.984 220.566 349.036 210.11L1251.78 -258.557C1307.45 -287.699 1343.38 -349.582 1344 -417.979V-1163.66C1343.38 -1216.29 1304.52 -1258.63 1257.18 -1257.95C1245.31 -1257.95 1233.74 -1254.86 1222.95 -1249.55L-357.247 -410.437C-447.46 -363.982 -504.98 -263.357 -504.98 -152.961V693.519" fill="currentColor" fill-opacity="0.1"/>
                        </svg> -->
                        <div class="pixa-outcomes-platform__card-wrapper">
                            <div class="pixa-outcomes-platform__card-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="76" height="76" viewBox="0 0 76 76" fill="none">
                                    <circle cx="38" cy="38" r="38" fill="white"/>
                                    <path d="M37.5605 18L57.1196 37.559L37.5605 57.1181" stroke="#221F20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M17.9999 37.5608H42.4171" stroke="#221F20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="pixa-outcomes-platform__card-content">
                                <h3 class="pixa-outcomes-platform__card-subtitle">Highest<br> Suitable Scale</h3>
                                <h2 class="pixa-outcomes-platform__card-title">5X</h2>
                                <p class="pixa-outcomes-platform__card-description">More safe/suitable YouTube channels than any other 3rd party</p>
                            </div>
                        </div>
                    </div>
                    <div class="pixa-outcomes-platform__card">
                        <!-- <svg class="pixa-outcomes-platform__card-background" viewBox="0 0 1344 634" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M-504.98 693.691C-507.139 943.281 -329.798 1149.16 -105.576 1157.39C120.959 1162.87 308.787 963.337 313.722 711.347C313.722 707.918 313.722 704.49 313.722 701.062V271.65C312.951 244.908 326.984 220.566 349.036 210.11L1251.78 -258.557C1307.45 -287.699 1343.38 -349.582 1344 -417.979V-1163.66C1343.38 -1216.29 1304.52 -1258.63 1257.18 -1257.95C1245.31 -1257.95 1233.74 -1254.86 1222.95 -1249.55L-357.247 -410.437C-447.46 -363.982 -504.98 -263.357 -504.98 -152.961V693.519" fill="currentColor" fill-opacity="0.1"/>
                        </svg> -->
                        <div class="pixa-outcomes-platform__card-wrapper">
                            <div class="pixa-outcomes-platform__card-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="76" height="76" viewBox="0 0 76 76" fill="none">
                                    <circle cx="38" cy="38" r="38" fill="white"/>
                                    <path d="M37.5605 18L57.1196 37.559L37.5605 57.1181" stroke="#221F20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M17.9999 37.5608H42.4171" stroke="#221F20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="pixa-outcomes-platform__card-content">
                                <h3 class="pixa-outcomes-platform__card-subtitle">AI-Driven<br> Performance</h3>
                                <h2 class="pixa-outcomes-platform__card-title">10X</h2>
                                <p class="pixa-outcomes-platform__card-description">Optimizations than native platform</p>
                            </div>
                        </div>
                    </div>
                    <div class="pixa-outcomes-platform__card">
                        <!-- <svg class="pixa-outcomes-platform__card-background" viewBox="0 0 1344 634" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M-504.98 693.691C-507.139 943.281 -329.798 1149.16 -105.576 1157.39C120.959 1162.87 308.787 963.337 313.722 711.347C313.722 707.918 313.722 704.49 313.722 701.062V271.65C312.951 244.908 326.984 220.566 349.036 210.11L1251.78 -258.557C1307.45 -287.699 1343.38 -349.582 1344 -417.979V-1163.66C1343.38 -1216.29 1304.52 -1258.63 1257.18 -1257.95C1245.31 -1257.95 1233.74 -1254.86 1222.95 -1249.55L-357.247 -410.437C-447.46 -363.982 -504.98 -263.357 -504.98 -152.961V693.519" fill="currentColor" fill-opacity="0.1"/>
                        </svg> -->
                        <div class="pixa-outcomes-platform__card-wrapper">
                            <div class="pixa-outcomes-platform__card-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="76" height="76" viewBox="0 0 76 76" fill="none">
                                    <circle cx="38" cy="38" r="38" fill="white"/>
                                    <path d="M37.5605 18L57.1196 37.559L37.5605 57.1181" stroke="#221F20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M17.9999 37.5608H42.4171" stroke="#221F20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="pixa-outcomes-platform__card-content">
                                <h3 class="pixa-outcomes-platform__card-subtitle">Maximized<br> Outcomes</h3>
                                <h2 class="pixa-outcomes-platform__card-title">45%</h2>
                                <p class="pixa-outcomes-platform__card-description">Net lift in suitability & performance</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<style type="text/css">
    .pixa-outcomes-platform {
        background-color: #DBFCFC;
        padding: 64px 40px;
    }
    .pixa-outcomes-platform__title {
        font-family: 'Manrope';
        font-weight: 600;
        font-size: 32px;
        position: absolute;
        top: 16px;
        left: 16px;
        z-index: 10;
        padding: 10px 20px;
        margin: 0;
    }
    @media (min-width: 1310px) {
        .pixa-outcomes-platform__title {
            font-size: 40px;
        }
    }
    .pixa-outcomes-platform__card-list {
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        margin-top: 40px;
    }
    @media (min-width: 1310px) {
        .pixa-outcomes-platform__card-list {
            flex-direction: row;
            margin-top: 0;
        }
    }

    .pixa-outcomes-platform__banner-container {
        position: relative;
        background-color: #FFFFFF;
        width: 100%;
        /* height: 632px; */
        border-radius: 14px;
        overflow: hidden;
    }
    @media (min-width: 1310px) {
        .pixa-outcomes-platform__banner-container {
            height: 632px;
        }
    }

    .pixa-outcomes-platform__card {
        width: 100%;
        height: 560px;
        padding: 20px;
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
    }
    @media (min-width: 1310px) {
        .pixa-outcomes-platform__card {
            height: 100%;
        }
    }

    .pixa-outcomes-platform__card-wrapper {
        position: relative;
        z-index: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 370px;
        max-height: 80%;
    }
    .pixa-outcomes-platform__card-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    .pixa-outcomes-platform__card-icon {
        flex-shrink: 0; /* Prevent icon from shrinking */
        margin-bottom: 55px;
    }
    .pixa-outcomes-platform__card-content {
        display: flex;
        flex-direction: column;
        flex-grow: 1; /* Allow content to grow and fill available space */
        overflow: hidden; /* Hide overflow if content is too large */
    }
    .pixa-outcomes-platform__card-title {
        color: #221F20;
        font-family: "PP Mori";
        font-size: 50px;
        font-style: normal;
        font-weight: 600;
        line-height: 110%; /* 55px */
        letter-spacing: -1px;
    }
    .pixa-outcomes-platform__card-subtitle {
        color: #221F20;
        font-family: Manrope;
        font-size: 32px;
        font-style: normal;
        font-weight: 500;
        line-height: 120%; /* 38.4px */
        margin-bottom: 10px;
    }
    .pixa-outcomes-platform__card-title {
        font-family: 'PP Mori';
        font-weight: 600;
        font-size: 50px;
    }
    .pixa-outcomes-platform__card-description {
        max-width: 70%;
        color: #221F20;
        font-family: Manrope;
        font-size: 20px;
        font-style: normal;
        font-weight: 400;
        line-height: 140%; /* 28px */
    }
    .pixa-outcomes-platform__card:last-child .pixa-outcomes-platform__card-subtitle,
    .pixa-outcomes-platform__card:last-child .pixa-outcomes-platform__card-title,
    .pixa-outcomes-platform__card:last-child .pixa-outcomes-platform__card-description {
        color: #fff;
    }

    /* @media (max-width: 1024px) {
        .pixa-outcomes-platform__card-list {
            flex-wrap: wrap;
        }
        .pixa-outcomes-platform__card {
            flex-basis: calc(50% - 10px);
        }
    } */

    @media (max-width: 768px) {
        .pixa-outcomes-platform__card {
            flex-basis: 100
        }
    }
</style>