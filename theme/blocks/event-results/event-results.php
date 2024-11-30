<?php

$selected_event = get_field('event_selector');
$winner = get_field('winner');
$date = get_field('date');

if ($selected_event) :
    global $wpdb;
    $table_name = $wpdb->prefix . 'darkjail_results';

    // Consulta para obtener los resultados del evento seleccionado, ordenados por fase
    $results = $wpdb->get_results($wpdb->prepare(
        "SELECT participants, phase, video_url FROM $table_name WHERE event = %s ORDER BY 
        CASE 
            WHEN LOWER(phase) IN ('final', 'gran final', 'última') THEN 1
            WHEN LOWER(phase) IN ('semis', 'semifinal', 'semi-final') THEN 2
            WHEN LOWER(phase) IN ('cuartos', '4tos', 'cuartos de final') THEN 3
            WHEN LOWER(phase) IN ('octavos', '8vos', 'octavos de final') THEN 4
            WHEN LOWER(phase) IN ('segunda fase', 'segunda', '2da', 'fase 2') THEN 5
            WHEN LOWER(phase) IN ('primera fase', 'primera', '1ra', 'fase 1') THEN 6
            ELSE 7
        END, phase DESC",
        $selected_event
    ));

    if (!empty($results)) :
        // Agrupar resultados por fase
        $phases = [];
        foreach ($results as $result) {
            $phases[$result->phase][] = $result;
        }
?>

        <div class="darkjail-results c-container my-8"
            <?php if (!is_admin()): ?>
            x-data="{ open: false, embedUrl: '' }"
            <?php endif; ?>>
            <h2 class="text-2xl font-bold mb-4">Resultados del evento: <?= esc_html($selected_event) ?></h2>

            <?php foreach ($phases as $phase => $matches) : ?>
                <section class="phase-section mb-8">
                    <h3 class="text-xl font-semibold bg-gray-800 text-white px-4 py-2 rounded"><?= esc_html($phase) ?></h3>
                    <div class="matches-container grid gap-4 sm:grid-cols-2 lg:grid-cols-3 p-4">
                        <?php foreach ($matches as $match) :
                            // Extraer el ID del video de YouTube para generar la URL de embed
                            preg_match("/(?:[\\?\\&]v=|youtu\\.be\\/|\\/embed\\/|\\/v\\/|\\/watch\\?v=|\\/videos\\/|\\/embed\\/|\\/e\\/|\\/shorts\\/|\\/watch\\?v=)([^\\?\\&\\/]{11})/i", $match->video_url, $matches);
                            $youtube_id = $matches[1];
                            $embed_url = "https://www.youtube-nocookie.com/embed/$youtube_id";
                        ?>
                            <div
                                <?php if (!is_admin()) : ?>
                                @click="open = true; embedUrl = '<?= esc_url($embed_url); ?>?autoplay=1'"
                                <?php endif; ?>
                                class="match-card hover:scale-105 transition flex flex-col items-start border border-gray-300 rounded-lg p-4 shadow-md bg-white cursor-pointer">
                                <p class="text-lg font-semibold text-black"><?= esc_html($match->participants) ?></p>
                                <p class="text-sm text-gray-700"><?= esc_html($match->phase) ?></p>
                                <span class="!text-black w-fit self-end !no-underline hover:underline mt-2 inline-block">
                                    <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="17" cy="17" r="17" fill="#ff6400" />
                                        <path d="M23.3749 16.264C23.9416 16.5911 23.9416 17.4091 23.3749 17.7362L14.4499 22.8891C13.8832 23.2162 13.1749 22.8073 13.1749 22.1529L13.1749 11.8472C13.1749 11.1929 13.8832 10.784 14.4499 11.1111L23.3749 16.264Z" fill="white" />
                                    </svg>
                                </span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endforeach; ?>

            <?php if (!is_admin()): ?>
                <!-- Modal para mostrar el video embebido -->
                <div

                    @click="open = false; embedUrl = ''" x-show="open" @keydown.window.escape="open = false; embedUrl = ''" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-75 z-50"
                    :class="{'!hidden': !open, 'modalOpened': open}" x-cloak>
                    <div class="p-2 max-w-screen-md w-full relative"
                        :class="{ 'bg-primary': open }">
                        <!-- Botón para cerrar la modal -->
                        <button @click="open = false; embedUrl = ''" class="text-2xl absolute z-20 -top-8 right-0 lg:-right-8 text-white hover:text-white/80 transition">
                            &#10005;
                        </button>

                        <!-- Video de YouTube embebido sin cookies y con autoplay -->
                        <div class="aspect-w-16 aspect-h-9">
                            <iframe class="w-full h-full" :src="embedUrl" frameborder="0" allow="autoplay" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    <?php else : ?>
        <p>No hay resultados para el evento seleccionado.</p>
    <?php endif;
else : ?>
    <p>No se ha seleccionado un evento.</p>
<?php endif; ?>