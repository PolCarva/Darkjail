<?php

/**
 * Block Name: Random Words
 */

$random_words = get_field('random_words'); // ACF repeater field for random words
$audio_files = get_field('audio_files'); // ACF repeater field for audio files

$words = [];
if ($random_words) {
    foreach ($random_words as $item) {
        $words[] = $item['word'];
    }
}
?>
<div id="remove-footer"></div>
<div class="flex flex-col items-center justify-center h-[calc(100svh-90px)] w-[calc(100svw)] bg-black text-white text-2xl relative overflow-hidden">
    <!-- Background Textures -->
    <div class="absolute inset-0 z-0">
        <div class="texture-container absolute inset-0 opacity-30">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/texture1.jpg" class="texture absolute inset-0 w-full h-full object-cover" alt="">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/texture2.jpg" class="texture absolute inset-0 w-full h-full object-cover" alt="">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/texture3.jpg" class="texture absolute inset-0 w-full h-full object-cover" alt="">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/texture4.jpg" class="texture absolute inset-0 w-full h-full object-cover" alt="">
        </div>
    </div>

    <!-- Start Button -->
    <div id="start-overlay" class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-80 z-10">
        <button id="start-button" class="p-4 bg-gray-700 hover:bg-gray-600 text-white rounded-lg text-xl h1">Empezar</button>
    </div>

    <div class="random-word h1 opacity-0 transition-opacity duration-500 absolute z-0">
        <?php if ($words): ?>
            <?php echo $words[array_rand($words)]; ?>
        <?php endif; ?>
    </div>

    <!-- Custom Audio Player -->
    <div class="absolute bottom-5 w-[80%] flex items-center justify-center z-10">
        <?php if ($audio_files): ?>
            <audio id="audio-player" class="hidden">
                <?php foreach ($audio_files as $audio): ?>
                    <source src="<?php echo esc_url($audio['beat']['url']); ?>" type="<?php echo esc_attr($audio['beat']['mime_type']); ?>">
                <?php endforeach; ?>
                Your browser does not support the audio element.
            </audio>
            <div id="custom-controls" class="flex items-center space-x-4">
                <button id="prev-track" class="p-2 grid place-content-center bg-gray-700 size-[44px] hover:bg-gray-600 rounded text-primary rotate-180">
                    <svg width="24" height="26" viewBox="0 0 24 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.14702 22.576L16.7014 14.8039C18.4329 13.8129 18.4329 12.1883 16.7014 11.1961L3.14581 3.42396C1.41428 2.43064 0 3.24357 0 5.22781V20.7722C0 22.7564 1.4167 23.5694 3.14581 22.576H3.14702Z" fill="currentColor" />
                        <path d="M22 2L22 24" stroke="currentColor" stroke-width="3" stroke-linecap="round" />
                    </svg>


                </button>
                <button id="play-pause" class="p-2 bg-gray-700 size-[44px] grid place-content-center hover:bg-gray-600 rounded text-primary">
                    <svg width="22" height="24" viewBox="0 0 22 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.35292 22.9489L19.7447 14.0623C21.7109 12.9293 21.7109 11.0717 19.7447 9.93729L4.35155 1.05066C2.3853 -0.0850852 0.779297 0.844415 0.779297 3.11316V20.8864C0.779297 23.1552 2.38805 24.0847 4.35155 22.9489H4.35292Z" fill="currentColor" />
                    </svg>


                </button>
                <button id="next-track" class="p-2 grid place-content-center bg-gray-700 size-[44px] hover:bg-gray-600 rounded text-primary">
                    <svg width="24" height="26" viewBox="0 0 24 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.14702 22.576L16.7014 14.8039C18.4329 13.8129 18.4329 12.1883 16.7014 11.1961L3.14581 3.42396C1.41428 2.43064 0 3.24357 0 5.22781V20.7722C0 22.7564 1.4167 23.5694 3.14581 22.576H3.14702Z" fill="currentColor" />
                        <path d="M22 2L22 24" stroke="currentColor" stroke-width="3" stroke-linecap="round" />
                    </svg>



                </button>
            </div>
        <?php endif; ?>
    </div>

    <!-- Responsive Slider -->
    <div class="absolute flex items-center space-y-2 md:flex-col md:right-20 md:space-y-2 top-5 md:top-auto z-10">
        <label for="interval-slider" class="text-sm text-center">Intervalo</label>
        <input type="range" id="interval-slider" class="w-40 mx-2 !mt-0 md:w-20 md:h-40 md:rotate-[-90deg]" min="1" max="10" value="3">
        <span id="slider-value" class="text-sm !mt-0">3s</span>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const words = <?php echo json_encode($words); ?>;
        const wordElement = document.querySelector('.random-word');
        const intervalSlider = document.getElementById('interval-slider');
        const sliderValue = document.getElementById('slider-value');
        const audioPlayer = document.getElementById('audio-player');
        const playPauseButton = document.getElementById('play-pause');
        const prevTrackButton = document.getElementById('prev-track');
        const nextTrackButton = document.getElementById('next-track');
        const startButton = document.getElementById('start-button');
        const startOverlay = document.getElementById('start-overlay');
        const tracks = audioPlayer.querySelectorAll('source');
        const textures = document.querySelectorAll('.texture');

        let currentTrackIndex = 0;
        let currentTextureIndex = 0;

        const footerRemover = document.getElementById('remove-footer');

        if (footerRemover) {
            document.querySelector('#colophon').style.display = 'none';
        }

        // Texture Animation
        function animateTextures() {
            textures.forEach((texture, index) => {
                texture.style.opacity = index === currentTextureIndex ? '1' : '0';
            });
            currentTextureIndex = (currentTextureIndex + 1) % textures.length;
        }

        // Initialize textures
        textures.forEach((texture, index) => {
            texture.style.opacity = index === 0 ? '1' : '0';
        });
        setInterval(animateTextures, 200); // Change texture every 200 ms

        function shuffle(array) {
            for (let i = array.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]];
            }
            return array;
        }

        let shuffledWords = shuffle([...words]);
        let index = 0;
        let interval = intervalSlider.value * 1000;
        let intervalId;

        function updateWord() {
            if (index >= shuffledWords.length) {
                shuffledWords = shuffle([...words]);
                index = 0;
            }
            wordElement.style.opacity = 0;
            setTimeout(() => {
                wordElement.textContent = shuffledWords[index];
                wordElement.style.opacity = 1;
                index++;
            }, 500);
        }

        function startInterval() {
            clearInterval(intervalId);
            updateWord(); // Show first word immediately
            intervalId = setInterval(updateWord, interval);
        }

        intervalSlider.addEventListener('input', function() {
            interval = intervalSlider.value * 1000;
            sliderValue.textContent = intervalSlider.value + 's';
            startInterval();
        });

        // Audio Controls
        function loadTrack(index) {
            audioPlayer.src = tracks[index].src;
            audioPlayer.load();
            audioPlayer.play();
            playPauseButton.innerHTML = ` <svg width="22" height="24" viewBox="0 0 22 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.35292 22.9489L19.7447 14.0623C21.7109 12.9293 21.7109 11.0717 19.7447 9.93729L4.35155 1.05066C2.3853 -0.0850852 0.779297 0.844415 0.779297 3.11316V20.8864C0.779297 23.1552 2.38805 24.0847 4.35155 22.9489H4.35292Z" fill="currentColor" />
                    </svg>`;
        }

        playPauseButton.addEventListener('click', () => {
            if (audioPlayer.paused) {
                audioPlayer.play();
                playPauseButton.innerHTML = `<svg width="22" height="26" viewBox="0 0 22 26" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M18.3333 25.8332C17.325 25.8332 16.4621 25.4745 15.7447 24.757C15.0272 24.0396 14.6679 23.1761 14.6667 22.1665V3.83317C14.6667 2.82484 15.026 1.96195 15.7447 1.24451C16.4633 0.527062 17.3262 0.167729 18.3333 0.166507C19.3404 0.165285 20.2039 0.524618 20.9238 1.24451C21.6437 1.9644 22.0024 2.82728 22 3.83317V22.1665C22 23.1748 21.6413 24.0383 20.9238 24.757C20.2064 25.4757 19.3429 25.8344 18.3333 25.8332ZM3.66667 25.8332C2.65833 25.8332 1.79544 25.4745 1.078 24.757C0.360555 24.0396 0.00122222 23.1761 0 22.1665V3.83317C0 2.82484 0.359333 1.96195 1.078 1.24451C1.79667 0.527062 2.65956 0.167729 3.66667 0.166507C4.67378 0.165285 5.53728 0.524618 6.25717 1.24451C6.97706 1.9644 7.33578 2.82728 7.33333 3.83317V22.1665C7.33333 23.1748 6.97461 24.0383 6.25717 24.757C5.53972 25.4757 4.67622 25.8344 3.66667 25.8332Z" fill="currentColor"/>
</svg>


`;
            } else {
                audioPlayer.pause();
                playPauseButton.innerHTML = ` <svg width="22" height="24" viewBox="0 0 22 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.35292 22.9489L19.7447 14.0623C21.7109 12.9293 21.7109 11.0717 19.7447 9.93729L4.35155 1.05066C2.3853 -0.0850852 0.779297 0.844415 0.779297 3.11316V20.8864C0.779297 23.1552 2.38805 24.0847 4.35155 22.9489H4.35292Z" fill="currentColor" />
                    </svg>`;
            }
        });

        prevTrackButton.addEventListener('click', () => {
            currentTrackIndex = (currentTrackIndex - 1 + tracks.length) % tracks.length;
            loadTrack(currentTrackIndex);
        });

        nextTrackButton.addEventListener('click', () => {
            currentTrackIndex = (currentTrackIndex + 1) % tracks.length;
            loadTrack(currentTrackIndex);
        });

        // Start Interaction
        startButton.addEventListener('click', () => {
            startOverlay.style.display = 'none';
            loadTrack(currentTrackIndex);
            startInterval();
        });
    });
</script>