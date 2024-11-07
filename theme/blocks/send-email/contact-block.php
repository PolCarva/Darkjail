<?php

$block_id = 'send-email' . uniqid();
$shortcode = '[wpforms id="254"]';
$title = get_field('title') ?? 'SI SOS UNA MARCA NO DUDES EN CONTACTARNOS';
$background_image = get_field('background_image') ?? '';
$section_id = uniqid('contact-');
?>


<div class="text-white !max-w-[1440px] bg-cover !px-4 md:!px-5 !py-20 lg:!py-12 lg:!px-20 c-container__sm relative md:gap-20 grid grid-cols-1 items-center md:grid-cols-2 min-w-[300px] md:min-h-0" style="background-image: url(<?php echo $background_image ?>); max-width: 1440px;">
    <div class="absolute inset-0 z-10 bg-black/40"></div>
    <div class="hidden"><?php echo $shortcode ?></div>
    <div class="relative z-10">
        <h2 class="h3" style="margin-bottom: 0 !important !text-center md:!text-left"><?php echo esc_html($title); ?></h2>
    </div>
    <div class="wpforms-container wpforms-container-full contact-form wpforms-render-modern relative z-10 !w-full" id="wpforms-254">
        <form id="wpforms-form-254" class="wpforms-validate wpforms-form wpforms-ajax-form" data-formid="254" method="post" enctype="multipart/form-data" action="/" data-token="f08f9a16d7fe31d35ae09b446e8d8d14" data-token-time="1731005144" novalidate="novalidate"><noscript class="wpforms-error-noscript">Por favor habilita Javascript para acceder a este contenido.</noscript>
            <div class="wpforms-hidden" id="wpforms-error-noscript">Por favor habilita Javascript para acceder a este contenido.</div>
            <div class="wpforms-field-container">
                <div id="wpforms-254-field_3-container" class="wpforms-field wpforms-field-text" data-field-type="text" data-field-id="3" style="position: absolute !important; overflow: hidden !important; display: inline !important; height: 1px !important; width: 1px !important; z-index: -1000 !important; padding: 0 !important;">
                    <label class="wpforms-field-label !hidden" for="wpforms-254-field_3" aria-hidden="true" style="counter-increment: none;">Email * Email</label>
                    <input type="text" id="wpforms-254-field_3" class="wpforms-field-medium" name="wpforms[fields][3]" aria-hidden="true" style="visibility: hidden;" tabindex="-1">
                </div>
                <div id="wpforms-254-field_2-container" class="wpforms-field wpforms-field-text" data-field-type="text" data-field-id="2">
                    <label class="wpforms-field-label" for="wpforms-254-field_2" aria-hidden="true">Email</label>
                    <input type="text" id="wpforms-254-field_2" class="wpforms-field-medium" name="wpforms[fields][2]" tabindex="-1" aria-hidden="true">
                </div>
                <div id="wpforms-254-field_1-container" class="!relative !w-full wpforms-field wpforms-field-email" data-field-id="1"><label class="wpforms-field-label !hidden" for="wpforms-254-field_1">Email <span class="wpforms-required-label" aria-hidden="true">*</span></label>
                    <div class='!relative'>
                        <input style="max-width: 100% !important; border-radius: 0; padding: 27px 23px; width: 100% !important" type="email" id="wpforms-254-field_1 " class="wpforms-field-medium wpforms-field-required !w-full" name="wpforms[fields][1]" placeholder="Escribe tu email" spellcheck="false" aria-errormessage="wpforms-254-field_1-error" required="">
                        <button style='border-radius: 0px;' type="submit" name="wpforms[submit]" id="wpforms-submit-254" class="!absolute !top-1/2 !-translate-y-1/2 !right-3 !bg-primary h4  hover:!bg-primary-700 after:!hidden !uppercase !font-syne !rounded-0 !transition wpforms-submit contact-form-btn" data-alt-text="Enviando..." data-submit-text="Enviar" aria-live="assertive" value="wpforms-submit">Enviar</button>
                    </div>
                </div>
            </div><!-- .wpforms-field-container -->
            <div class="wpforms-submit-container"><input type="hidden" name="wpforms[id]" value="254"> <input type="hidden" name="wpforms[nonce]" value="caea4a7fe8">
                <input type="hidden" name="page_title" value="Home"><input type="hidden" name="page_url" value="http://darkjail.local/"><input type="hidden" name="page_id" value="114"><input type="hidden" name="wpforms[post_id]" value="114"><img loading="lazy" decoding="async" src="http://darkjail.local/wp-content/plugins/wpforms-lite/assets/images/submit-spin.svg" class="wpforms-submit-spinner" style="display: none;" width="26" height="26" alt="Loading">
            </div>
        </form>
    </div>
    <?php get_template_part('template-parts/styles/margin-styles', '', array(
        'section_id' => $block_id,
    )); ?>

</div>