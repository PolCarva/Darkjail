<?php
$heading = get_field('news_heading', 'option');
$subheading = get_field('news_subheading', 'option');
?>

<section class="newsletter mx-auto py-12 bg-slate-200">
    <div class="flex flex-col items-center container-mid max-content-inner-big text-custom-primary ">
        <h2 class="h1 text-center"><?php echo $heading; ?></h2>
        <p class="font-semibold text:md lg:text-lg  mb-6 text-center"><?php echo $subheading; ?></p>
        <?php echo do_shortcode('[contact-form-7 id="ca3a04e" title="Contact form 1"]'); ?>
    </div>
</section>