<?php
$slides = get_field('slides');


$block_id = uniqid("link-slider-");
?>

<section class="max-w-sceen-lg mx-auto mt-10" id="<?= $block_id ?>">
    <div
        <?php if (!is_admin()): ?>
        x-data="linkSlider"
        <?php endif; ?>
        class="swiper relative swiper-container px-5 md:px-20">
        <div class="swiper-wrapper"
            <?php if (!is_admin()): ?>
            x-data="{ activeIndex: 2, hoveredIndex: null }"
            <?php endif; ?>>


            <?php foreach ($slides as $index => $slide) :
                $thumbnail = $slide['thumbnail_img'];
                $link = $slide['link'];
                $title = $slide['title'];

            ?>
                <!-- Miniatura del video -->
                <a href="<?= $link ?>" class="flex justify-center  relative swiper-slide <?php echo is_admin() ? 'mr-5 md:!max-w-[22%]' : 'w-full' ?>">
                    <div class="relative group w-full aspect-h-16 aspect-w-9 cursor-pointer overflow-hidden"
                        <?php if (!is_admin()): ?>
                        @mouseenter="hoveredIndex = <?= $index ?>; activeIndex = <?= $index ?>"
                        @mouseleave="hoveredIndex = null"
                        <?php endif; ?>>

                        <!-- Imagen miniatura -->
                        <img src="<?php echo esc_url($thumbnail['url']); ?>" alt="Miniatura del video"
                            class="cursor-pointer w-full h-full group-hover:scale-110 object-cover shadow-lg hover:shadow-xl transition duration-300"
                            :class="{ 
                                'saturate-100': activeIndex === <?= $index ?> || hoveredIndex === <?= $index ?>, 
                                'saturate-0': hoveredIndex !== <?= $index ?> && activeIndex !== <?= $index ?>}">

                        <!-- Overlay para el hover y active -->
                        <div
                            class="hidden md:block bg-black bg-opacity-10 transition inset-0 absolute"
                            <?php if (!is_admin()): ?>
                            :class="{ 
                                'backdrop-blur-0 bg-opacity-0': activeIndex === <?= $index ?> || hoveredIndex === <?= $index ?>, 
                                'backdrop-blur-sm': hoveredIndex !== <?= $index ?> && activeIndex !== <?= $index ?> 
                            }"
                            <?php endif; ?>>
                        </div>
                        <!-- Título y Ver mas -->
                        <div class="absolute bottom-5 left-5 right-5 flex justify-between items-center">
                            <h3 class="text-white text-lg font-bold"><?= $title ?></h3>
                            <div class="flex items-center py-4 px-2 bg-primary hover:bg-primary-700">
                                <span class="text-white">Ver más</span>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>


        </div>

        <div class="link-slider__prev hidden md:block absolute top-1/2 -translate-y-1/2 left-5 z-10">
            <svg class="drop-shadow-[0px_0px_5px_#11111140]" width="24" height="41" viewBox="0 0 24 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.53346 22.5915C0.978856 22.0368 0.667297 21.2844 0.667297 20.5C0.667297 19.7156 0.978856 18.9632 1.53346 18.4085L18.2688 1.67316C18.5416 1.39061 18.8681 1.16524 19.229 1.0102C19.5899 0.855154 19.9781 0.773545 20.3709 0.770131C20.7637 0.766718 21.1533 0.84157 21.5169 0.990317C21.8804 1.13906 22.2107 1.35873 22.4885 1.6365C22.7663 1.91426 22.9859 2.24456 23.1347 2.60813C23.2834 2.9717 23.3583 3.36125 23.3549 3.75406C23.3515 4.14687 23.2698 4.53506 23.1148 4.89599C22.9598 5.25691 22.7344 5.58335 22.4518 5.85625L7.80808 20.5L22.4518 35.1438C22.9907 35.7017 23.2889 36.449 23.2822 37.2246C23.2754 38.0003 22.9643 38.7423 22.4158 39.2908C21.8673 39.8393 21.1253 40.1504 20.3496 40.1572C19.574 40.1639 18.8267 39.8657 18.2688 39.3268L1.53346 22.5915Z" fill="white" />
            </svg>
        </div>
        <div class="link-slider__next absolute hidden md:block top-1/2 -translate-y-1/2 right-5 z-10">
            <svg class="drop-shadow-[0px_0px_5px_#11111140]" width="24" height="41" viewBox="0 0 24 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M22.4665 18.4085C23.0211 18.9632 23.3327 19.7156 23.3327 20.5C23.3327 21.2844 23.0211 22.0368 22.4665 22.5915L5.73125 39.3268C5.45835 39.6094 5.13192 39.8348 4.77099 39.9898C4.41006 40.1448 4.02187 40.2265 3.62906 40.2299C3.23626 40.2333 2.8467 40.1584 2.48314 40.0097C2.11957 39.8609 1.78926 39.6413 1.5115 39.3635C1.23373 39.0857 1.01406 38.7554 0.865317 38.3919C0.71657 38.0283 0.641718 37.6387 0.645132 37.2459C0.648547 36.8531 0.730156 36.4649 0.885199 36.104C1.04024 35.7431 1.26561 35.4166 1.54816 35.1437L16.1919 20.5L1.54817 5.85625C1.00928 5.2983 0.711099 4.55102 0.71784 3.77535C0.72458 2.99969 1.03571 2.2577 1.5842 1.7092C2.1327 1.1607 2.87469 0.849577 3.65036 0.842837C4.42602 0.836096 5.17331 1.13428 5.73125 1.67316L22.4665 18.4085Z" fill="white" />
            </svg>

        </div>
    </div>

    <?php
    get_template_part('template-parts/styles/margin-styles', '', array(
        'section_id' => $block_id,
    ));
    ?>
</section>


<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('linkSlider', () => ({
            init() {
                new Swiper(this.$el, {
                    direction: 'horizontal',
                    slidesPerView: 1.75,
                    initialSlide: 1,
                    spaceBetween: 20,
                    effect: 'coverflow', // Activar el efecto Coverflow
                    coverflowEffect: {
                        rotate: 30,
                        stretch: 0,
                        depth: 100,
                        modifier: 1,
                        slideShadows: true,
                    },
                    breakpoints: {
                        768: {
                            slidesPerView: 3.8,
                        },
                        1080: {
                            slidesPerView: 4.5,
                        },
                    },
                    navigation: {
                        nextEl: '.link-slider__next',
                        prevEl: '.link-slider__prev',
                    },
                });
            },
        }));
    });
</script>