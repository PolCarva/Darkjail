<?php
/*
Use example: 	

get_template_part('template-parts/components/hero', '', array(
    'heading' => 'my heading',
    'subheading' => 'my subheading',
    'image' => 3,
    'button' => array(
        'text' => 'Button Text',
        'url' => 'https://example.com/button-url',
    ),
    'right_align' => true,
    'heading_type' => 'h1',
    'desktop_full_width' => true,
));

*/
// Extract the variables from the array
extract($args);

?>

<section>
    <div class="bg-center bg-cover py-12 <?php if (!$desktop_full_width) : ?> container-mid <?php endif ?> " style="background-image: url('<?php echo wp_get_attachment_url($image, 'extra-large'); ?>');">
        <div class="<?php if ($desktop_full_width) : ?> max-content-inner-big <?php endif ?> flex <?php if ($right_align) : ?>
            justify-end
        <?php endif; ?>   
             ">
            <div class="hero-info bg-white p-8 max-w-lg rounded-lg ">
                <<?php echo $heading_type ?> class="hero-heading h1"><?php echo esc_html($heading); ?></<? echo $heading_type ?>>
                <?php
                if (isset($subheading) && $subheading) :
                ?>
                    <p class="hero-subheading text-lg mb-6"><?php echo esc_html($subheading); ?></p>
                <?php endif; ?>
                <?php
                // Button if $button is set, if not prevent warning
                if (isset($button) && is_array($button) && isset($button['text']) && isset($button['url']) && $button['text'] && $button['url']) {
                    get_template_part('template-parts/components/button', '', array('type' => 'primary', 'button' => $button));
                }

                ?>
            </div>
        </div>
    </div>