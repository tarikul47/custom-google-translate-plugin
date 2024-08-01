<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Fennaco_Translate_Frontend
{

    public static function render_language_switcher()
    {
        $options = get_option('fennaco_translate_settings');
        $languages = Fennaco_Translate_Admin::get_languages(); // Ensure this method is correctly defined in the admin class.

        ?>
        <div id="google_translate_element2">
            <div id="google_translate_element"></div>
        </div>
        <div id="fennaco_translate_languages_selector" class="notranslate">
            <?php
            if (!empty($options['languages'])) {
                foreach ($options['languages'] as $lang_code => $checked) {
                    if (isset($languages[$lang_code])) {
                        echo '<a href="#" class="translate-lang" data-lang="' . esc_attr($lang_code) . '">' . esc_html($languages[$lang_code]) . '</a><br>';
                    }
                }
            }
            ?>
        </div>
        <?php
    }

    public static function enqueue_scripts()
    {
        $options = get_option('fennaco_translate_settings');
        wp_enqueue_style('fennaco-style', FENNACO_TRANSLATE_PLUGIN_URL . 'assets/css/fennaco-translate.css', );
        // Ensure Google Translate script is loaded before custom script
        wp_enqueue_script('fennaco-translate-frontend', FENNACO_TRANSLATE_PLUGIN_URL . 'assets/js/fennaco-translate-frontend.js', array('jquery'), FENNACO_TRANSLATE_VERSION, true);
        
        wp_enqueue_script('google-translate', 'http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit', array(), null, true);
      
        wp_localize_script('fennaco-translate-frontend', 'fennaco_settings', $options);
    }
}
