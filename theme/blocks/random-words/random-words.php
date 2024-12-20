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
<div class="flex flex-col items-center justify-center h-[70vh] w-[98svw] bg-black text-white text-2xl relative">
    <!-- Start Button -->
    <div id="start-overlay" class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-80 z-50">
        <button id="start-button" class="p-4 bg-gray-700 hover:bg-gray-600 text-white rounded-lg text-xl h1">Start</button>
    </div>

    <div class="random-word h1 opacity-0 transition-opacity duration-500 absolute">
        <?php if ($words): ?>
            <?php echo $words[array_rand($words)]; ?>
        <?php endif; ?>
    </div>

    <!-- Custom Audio Player -->
    <div class="absolute bottom-5 w-[80%] flex items-center justify-center">
        <?php if ($audio_files): ?>
            <audio id="audio-player" class="hidden">
                <?php foreach ($audio_files as $audio): ?>
                    <source src="<?php echo esc_url($audio['beat']['url']); ?>" type="<?php echo esc_attr($audio['beat']['mime_type']); ?>">
                <?php endforeach; ?>
                Your browser does not support the audio element.
            </audio>
            <div id="custom-controls" class="flex items-center space-x-4">
                <button id="prev-track" class="p-2 bg-gray-700 hover:bg-gray-600 rounded">⏮️</button>
                <button id="play-pause" class="p-2 bg-gray-700 hover:bg-gray-600 rounded">▶️</button>
                <button id="next-track" class="p-2 bg-gray-700 hover:bg-gray-600 rounded">⏭️</button>
            </div>
        <?php endif; ?>
    </div>

    <!-- Responsive Slider -->
    <div class="absolute flex items-center space-y-2 md:flex-col md:right-20 md:space-y-2 top-5 md:top-auto">
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

        let currentTrackIndex = 0;

        const footerRemover = document.getElementById('remove-footer');

        if (footerRemover) {
            document.querySelector('#colophon').style.display = 'none';
        }

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
            playPauseButton.textContent = '⏸️';
        }

        playPauseButton.addEventListener('click', () => {
            if (audioPlayer.paused) {
                audioPlayer.play();
                playPauseButton.textContent = '⏸️';
            } else {
                audioPlayer.pause();
                playPauseButton.textContent = '▶️';
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