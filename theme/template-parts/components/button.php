<?php

/**
 * Button Component
 *
 * @param string $type   The button type (e.g., primary, secondary, etc.).
 * @param array  $button An array of button fields.
 */

// Extract the variables from the array
extract($args);

$button_text = $button['text'];
$button_url = $button['url'];

if (!empty($button_text) && !empty($button_url)) {
    $classes = 'button my-2 inline-block py-2 px-4 rounded-full border border-3';

    if ($type === 'primary') {
        $classes .= ' border-blue-600 !text-blue-600 hover:!text-blue-800';
    }
    // Add more cases for other button types as needed.

?>
    <a href="<?php echo esc_url($button_url); ?>">
        <button class="bg-custom-primary rounded-full text-white hover:bg-custom-secondary hover:text-white py-2 px-6 font-semibold uppercase tracking-wider focus:outline-none ">
            <?php echo esc_html($button_text); ?>
        </button>

    </a>
<?php
}

?>