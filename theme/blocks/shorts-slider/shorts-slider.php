<?php
$shorts = get_field('shorts');

$block_id = uniqid("shorts-slider-");
?>

<section class="max-w-sceen-lg mx-auto mt-10" id="<?= $block_id ?>">
    <div x-data="shortSlider" class="swiper relative swiper-container">
        <div class="swiper-wrapper" x-data="{ activeIndex: 2, hoveredIndex: null }">


            <?php foreach ($shorts as $index => $short) :
                $short_link = $short['link'];
                $thumbnail = $short['thumbnail_img'];
            ?>
                <!-- Miniatura del video -->
                <div class="flex justify-center w-full relative swiper-slide">
                    <div class="relative group w-full aspect-h-16 aspect-w-9 cursor-pointer overflow-hidden"
                        x-data
                        @mouseenter="hoveredIndex = <?= $index ?>; activeIndex = <?= $index ?>"
                        @mouseleave="hoveredIndex = null"
                        :class="{ 'hovered': hoveredIndex === <?= $index ?> }">
                        <img src="<?php echo esc_url($thumbnail['url']); ?>" alt="Miniatura del video" class="cursor-pointer w-full h-full group-hover:scale-110 object-cover shadow-lg hover:shadow-xl transition duration-300">
                        <div
                            class="hidden md:block bg-black overlay bg-opacity-10 transition inset-0 absolute"
                            :class="{ 'backdrop-blur-0 bg-opacity-0': activeIndex === <?= $index ?> || hoveredIndex === <?= $index ?> || activeIndex === null && $el.closest('.swiper-slide').classList.contains('swiper-slide-next'),
                              'backdrop-blur-sm': hoveredIndex !== <?= $index ?> && (activeIndex !== <?= $index ?> || activeIndex === null && !$el.closest('.swiper-slide').classList.contains('swiper-slide-next')) }">
                        </div>
                        <!-- Play button -->
                        <svg class="cursor-pointer absolute fill-primary hover:fill-primary-700 group-hover:scale-110 transition left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 size-12 md:size-16 lg:size-28" width="110" height="110" viewBox="0 0 110 110" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="110" height="110" rx="55" fill="white" fill-opacity="0.6" />
                            <path d="M85.7657 55.275C85.7675 56.0278 85.5745 56.7683 85.2054 57.4244C84.8363 58.0805 84.3037 58.63 83.6593 59.0193L43.7278 83.4472C43.0546 83.8594 42.2835 84.0845 41.4942 84.0991C40.7049 84.1137 39.926 83.9173 39.238 83.5303C38.5565 83.1493 37.9888 82.5936 37.5933 81.9204C37.1978 81.2472 36.9887 80.4809 36.9875 79.7001V30.8499C36.9887 30.0692 37.1978 29.3028 37.5933 28.6296C37.9888 27.9564 38.5565 27.4008 39.238 27.0197C39.926 26.6327 40.7049 26.4363 41.4942 26.451C42.2835 26.4656 43.0546 26.6906 43.7278 27.1029L83.6593 51.5307C84.3037 51.9201 84.8363 52.4695 85.2054 53.1256C85.5745 53.7817 85.7675 54.5222 85.7657 55.275Z" />
                        </svg>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="short-slider__prev hidden md:block absolute top-1/2 -translate-y-1/2 left-5 z-10">
            <svg class="drop-shadow-[0px_0px_5px_#11111140]" width="24" height="41" viewBox="0 0 24 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.53346 22.5915C0.978856 22.0368 0.667297 21.2844 0.667297 20.5C0.667297 19.7156 0.978856 18.9632 1.53346 18.4085L18.2688 1.67316C18.5416 1.39061 18.8681 1.16524 19.229 1.0102C19.5899 0.855154 19.9781 0.773545 20.3709 0.770131C20.7637 0.766718 21.1533 0.84157 21.5169 0.990317C21.8804 1.13906 22.2107 1.35873 22.4885 1.6365C22.7663 1.91426 22.9859 2.24456 23.1347 2.60813C23.2834 2.9717 23.3583 3.36125 23.3549 3.75406C23.3515 4.14687 23.2698 4.53506 23.1148 4.89599C22.9598 5.25691 22.7344 5.58335 22.4518 5.85625L7.80808 20.5L22.4518 35.1438C22.9907 35.7017 23.2889 36.449 23.2822 37.2246C23.2754 38.0003 22.9643 38.7423 22.4158 39.2908C21.8673 39.8393 21.1253 40.1504 20.3496 40.1572C19.574 40.1639 18.8267 39.8657 18.2688 39.3268L1.53346 22.5915Z" fill="white" />
            </svg>
        </div>
        <div class="short-slider__next absolute hidden md:block top-1/2 -translate-y-1/2 right-5 z-10">
            <svg class="drop-shadow-[0px_0px_5px_#11111140]" width="24" height="41" viewBox="0 0 24 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M22.4665 18.4085C23.0211 18.9632 23.3327 19.7156 23.3327 20.5C23.3327 21.2844 23.0211 22.0368 22.4665 22.5915L5.73125 39.3268C5.45835 39.6094 5.13192 39.8348 4.77099 39.9898C4.41006 40.1448 4.02187 40.2265 3.62906 40.2299C3.23626 40.2333 2.8467 40.1584 2.48314 40.0097C2.11957 39.8609 1.78926 39.6413 1.5115 39.3635C1.23373 39.0857 1.01406 38.7554 0.865317 38.3919C0.71657 38.0283 0.641718 37.6387 0.645132 37.2459C0.648547 36.8531 0.730156 36.4649 0.885199 36.104C1.04024 35.7431 1.26561 35.4166 1.54816 35.1437L16.1919 20.5L1.54817 5.85625C1.00928 5.2983 0.711099 4.55102 0.71784 3.77535C0.72458 2.99969 1.03571 2.2577 1.5842 1.7092C2.1327 1.1607 2.87469 0.849577 3.65036 0.842837C4.42602 0.836096 5.17331 1.13428 5.73125 1.67316L22.4665 18.4085Z" fill="white" />
            </svg>

        </div>
    </div>

</section>



<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('shortSlider', () => ({
            init() {
                new Swiper(this.$el, {
                    direction: 'horizontal',
                    slidesPerView: 2.2,
                    initialSlide: 1,
                    spaceBetween: 20,
                    breakpoints: {
                        768: {
                            slidesPerView: 3.8,
                        },
                        1080: {
                            slidesPerView: 4.5,
                        },


                    },
                    navigation: {
                        nextEl: '.short-slider__next',
                        prevEl: '.short-slider__prev',
                    },
                });
            },
        }));
    })
</script>