<?php

$block_id = 'spacer-' . $block['id'];
?>

<section id="<?= $block_id ?>">

    <div class="c-container h-2">
        <img src="https://darkjail.com/wp-content/uploads/2024/10/spacer.png" alt="espaciador" class="w-full h-auto">
    </div>
    <?php
    get_template_part('template-parts/styles/margin-styles', '', array(
        'section_id' => $block_id,
    ));
    ?>
</section>