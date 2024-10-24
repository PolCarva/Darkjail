<?php
$youtube_url = get_field('yt_link');
$thumbnail_img = get_field('thumbnail_img');

// Asegurarse de que haya una URL de YouTube
if ($youtube_url):
    // Extraer el ID del video de YouTube
    preg_match("/(?:[\\?\\&]v=|youtu\\.be\\/|\\/embed\\/|\\/v\\/|\\/watch\\?v=|\\/videos\\/|\\/embed\\/|\\/e\\/|\\/shorts\\/|\\/watch\\?v=)([^\\?\\&\\/]{11})/i", $youtube_url, $matches);
    $youtube_id = $matches[1];

    // Verificar si hay una miniatura personalizada o usar la predeterminada de YouTube
    if ($thumbnail_img) {
        $thumbnail_url = $thumbnail_img['url'];
    } else {
        $thumbnail_url = "https://img.youtube.com/vi/$youtube_id/hqdefault.jpg";
    }

    $embed_url = "https://www.youtube-nocookie.com/embed/$youtube_id";
?>

    <section class="c-container__sm max-w-sceen-lg mx-auto mt-10"
        <?php if (!is_admin()): // Solo aplicar Alpine.js si no estamos en el editor 
        ?>
        x-data="{ open: false, embedUrl: '' }"
        <?php endif; ?>>
        <!-- Miniatura del video -->
        <div class="flex justify-center w-full relative">
            <div class="relative group w-full aspect-w-16 aspect-h-9"
                <?php if (!is_admin()): // Solo aplicar Alpine.js si no estamos en el editor 
                ?>
                @click="open = true; embedUrl = '<?php echo esc_url($embed_url); ?>?'"
                <?php endif; ?>>
                <img src="<?php echo esc_url($thumbnail_url); ?>" alt="Miniatura del video" class="cursor-pointer w-full h-full object-cover shadow-lg hover:shadow-xl transition duration-300">
                <!-- Play button -->
                <svg class="cursor-pointer absolute fill-primary hover:fill-primary-700 group-hover:scale-110 transition left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 size-12 md:size-16 lg:size-28" width="110" height="110" viewBox="0 0 110 110" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="110" height="110" rx="55" fill="white" fill-opacity="0.6" />
                    <path d="M85.7657 55.275C85.7675 56.0278 85.5745 56.7683 85.2054 57.4244C84.8363 58.0805 84.3037 58.63 83.6593 59.0193L43.7278 83.4472C43.0546 83.8594 42.2835 84.0845 41.4942 84.0991C40.7049 84.1137 39.926 83.9173 39.238 83.5303C38.5565 83.1493 37.9888 82.5936 37.5933 81.9204C37.1978 81.2472 36.9887 80.4809 36.9875 79.7001V30.8499C36.9887 30.0692 37.1978 29.3028 37.5933 28.6296C37.9888 27.9564 38.5565 27.4008 39.238 27.0197C39.926 26.6327 40.7049 26.4363 41.4942 26.451C42.2835 26.4656 43.0546 26.6906 43.7278 27.1029L83.6593 51.5307C84.3037 51.9201 84.8363 52.4695 85.2054 53.1256C85.5745 53.7817 85.7675 54.5222 85.7657 55.275Z" />
                </svg>
            </div>

            <!-- Tapes -->
            <img class="absolute top-0 lg:top-2 left-2 lg:left-4 -translate-x-1/2 -rotate-45 w-12 sm:w-16 md:w-20 lg:w-28" src="https://darkjail.com/wp-content/uploads/2024/10/tape.png" alt="Cinta">
            <img class="absolute bottom-0 right-3 translate-x-1/2 -rotate-45 w-12 sm:w-16 md:w-20 lg:w-28" src="https://darkjail.com/wp-content/uploads/2024/10/tape.png" alt="Cinta">
        </div>

        <!-- Modal (solo visible en el frontend, no en el editor) -->
        <?php if (!is_admin()): ?>
            <div @click="open = false; embedUrl = ''" x-show="open" @keydown.window.escape="open = false; embedUrl = ''" class="fixed flex inset-0 items-center justify-center bg-black bg-opacity-75 z-50"
                :class="{'!hidden': !open, 'modalOpened': open}"

                x-cloak>
                <div class="p-2 max-w-screen-md w-full relative"
                    :class="{ 'bg-primary': open }">
                    <!-- Botón para cerrar la modal -->
                    <button @click="open = false; embedUrl = ''" class="text-2xl size-8 absolute z-20 -top-8 right-0 lg:-right-8 text-white hover:text-white/80 transition">
                        &#10005;
                    </button>

                    <!-- Video de YouTube embebido sin cookies y con autoplay -->
                    <div class="aspect-w-16 aspect-h-9">
                        <iframe class="w-full h-full" :src="embedUrl" frameborder="0" allow="autoplay" allowfullscreen></iframe>
                    </div>

                </div>

            </div>
        <?php endif; ?>
    </section>

<?php endif; ?>