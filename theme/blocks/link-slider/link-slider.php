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
        <div class="swiper-wrapper">
            <?php foreach ($slides as $index => $slide) :
                $thumbnail = $slide['thumbnail_img'];
                $link = $slide['link'];
                $title = $slide['title'];

            ?>
                <!-- Miniatura del video -->
                <a href="<?= $link ?>" class="flex justify-center  relative swiper-slide <?php echo is_admin() ? 'mr-5 md:!max-w-[22%]' : 'w-full' ?>">
                    <div class="relative group w-full aspect-h-16 aspect-w-9 cursor-pointer overflow-hidden">

                        <!-- Imagen miniatura -->
                        <img src="<?php echo esc_url($thumbnail['url']); ?>" alt="Miniatura del video"
                            class="cursor-pointer w-full h-full group-hover:scale-110 object-cover shadow-lg hover:shadow-xl transition duration-300">

                        <!-- Overlay para el hover y active -->
                        <div
                            class="hidden overlay md:block bg-black bg-opacity-10 transition inset-0 absolute">
                        </div>
                        <!-- Título y Ver mas -->
                        <div class="absolute inset-0 flex flex-col justify-center items-center">
                            <h3 class=" h2 font-extrabold text-white text-center px-3 md:px-2"><?= $title ?></h3>
                            <div class="flex items-center py-2 font-heebo px-4 font-semibold bg-primary transition hover:bg-primary-700">
                                <span class="text-white">Ver más</span>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>


        </div>

        <div class="link-slider__prevblock absolute top-1/2 -translate-y-1/2 left-5 z-10">
            <svg class="rotate-180  scale-50 md:scale-100 
             drop-shadow-[0px_0px_5px_#11111140]" width="24" height="41" viewBox="0 0 24 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M22.4665 18.4085C23.0211 18.9632 23.3327 19.7156 23.3327 20.5C23.3327 21.2844 23.0211 22.0368 22.4665 22.5915L5.73125 39.3268C5.45835 39.6094 5.13192 39.8348 4.77099 39.9898C4.41006 40.1448 4.02187 40.2265 3.62906 40.2299C3.23626 40.2333 2.8467 40.1584 2.48314 40.0097C2.11957 39.8609 1.78926 39.6413 1.5115 39.3635C1.23373 39.0857 1.01406 38.7554 0.865317 38.3919C0.71657 38.0283 0.641718 37.6387 0.645132 37.2459C0.648547 36.8531 0.730156 36.4649 0.885199 36.104C1.04024 35.7431 1.26561 35.4166 1.54816 35.1437L16.1919 20.5L1.54817 5.85625C1.00928 5.2983 0.711099 4.55102 0.71784 3.77535C0.72458 2.99969 1.03571 2.2577 1.5842 1.7092C2.1327 1.1607 2.87469 0.849577 3.65036 0.842837C4.42602 0.836096 5.17331 1.13428 5.73125 1.67316L22.4665 18.4085Z" fill="white" />
            </svg>
        </div>
        <div class="link-slider__next absolute block top-1/2 -translate-y-1/2 right-5 z-10">
            <svg class="scale-50 md:scale-100  drop-shadow-[0px_0px_5px_#11111140]" width="24" height="41" viewBox="0 0 24 41" fill="none" xmlns="http://www.w3.org/2000/svg">
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

<style>
    #<?= $block_id . " " ?>.swiper-slide img {
        filter: saturate(0);
    }

    #<?= $block_id . " " ?>.swiper-slide .overlay {
        backdrop-filter: blur(5px);
    }

    #<?= $block_id . " " ?>.swiper-slide-active img {
        filter: saturate(1);

    }

    #<?= $block_id . " " ?>.swiper-slide-active .overlay {
        backdrop-filter: blur(0px);
    }

    @media (min-width: 500px) {

        #<?= $block_id . " " ?>.swiper-slide-active img {
            filter: saturate(0);

        }

        #<?= $block_id . " " ?>.swiper-slide-active .overlay {
            backdrop-filter: blur(5px);
        }

        #<?= $block_id . " " ?>.swiper-slide-next+.swiper-slide-visible img {
            filter: saturate(1);

        }

        #<?= $block_id . " " ?>.swiper-slide-next+.swiper-slide-visible .overlay {
            backdrop-filter: blur(0px);
        }
    }
</style>


<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('linkSlider', () => ({
            init() {
                new Swiper(this.$el, {
                    direction: 'horizontal',
                    slidesPerView: 1.2,
                    initialSlide: 0,
                    effect: 'coverflow', // Activar el efecto Coverflow

                    centeredSlides: false,
                    coverflowEffect: {
                        rotate: 0,
                        stretch: 0, // Desplaza las slides
                        depth: 150,
                        modifier: 1,
                        slideShadows: true,
                    },

                    loop: true,
                    breakpoints: {
                        500: {

                            slidesPerView: 2.5,
                        },
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