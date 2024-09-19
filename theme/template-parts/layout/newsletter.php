<?php
$heading = get_field('news_heading', 'option');
$subheading = get_field('news_subheading', 'option');
?>

<section class="py-12 mx-auto newsletter bg-slate-200">
	<div class="flex flex-col items-center text-black container-mid max-content-inner-big">
		<h2 class="text-center h1"><?php echo $heading; ?></h2>
		<p class="mb-6 font-semibold text-center text:md lg:text-lg"><?php echo $subheading; ?></p>
		<?php echo do_shortcode('[contact-form-7 id="ca3a04e" title="Contact form 1"]'); ?>
	</div>
</section>
