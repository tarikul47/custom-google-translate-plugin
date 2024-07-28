<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Fennaco_Translate_Admin
{

    public static function add_admin_menu()
    {
        add_menu_page(
            __('Fennaco Translate', 'fennaco-translate'),
            __('Fennaco Translate', 'fennaco-translate'),
            'manage_options',
            'fennaco-translate',
            array(__CLASS__, 'admin_page'),
            'dashicons-translation'
        );
    }

    public static function settings_init()
    {
        register_setting('fennaco_translate', 'fennaco_translate_settings');

        add_settings_section(
            'fennaco_translate_section',
            __('Manage Languages', 'fennaco-translate'),
            array(__CLASS__, 'settings_section_callback'),
            'fennaco_translate'
        );

        add_settings_field(
            'fennaco_translate_languages',
            __('Languages', 'fennaco-translate'),
            array(__CLASS__, 'languages_render'),
            'fennaco_translate',
            'fennaco_translate_section'
        );
    }

    public static function settings_section_callback()
    {
        echo __('Select the languages you want to make available for translation.', 'fennaco-translate');
    }

    public static function languages_render()
    {
        $options = get_option('fennaco_translate_settings');
        $languages = self::get_languages();
        foreach ($languages as $lang_code => $lang_name) {
            $checked = isset($options['languages'][$lang_code]) ? 'checked' : '';
            echo '<label><input type="checkbox" name="fennaco_translate_settings[languages][' . esc_attr($lang_code) . ']" ' . $checked . '> ' . esc_html($lang_name) . '</label><br>';
        }
    }

    public static function admin_page()
    {
        ?>
        <div class="wrap">
            <h1><?php _e('Fennaco Translate', 'fennaco-translate'); ?></h1>
            <form action="options.php" method="post">
                <?php
                settings_fields('fennaco_translate');
                do_settings_sections('fennaco_translate');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    public static function get_languages()
    {
        return [
            'af' => 'Afrikaans',
            'sq' => 'Albanian',
            'am' => 'Amharic',
            'ar' => 'Arabic',
            'hy' => 'Armenian',
            'az' => 'Azerbaijani',
            'eu' => 'Basque',
            'be' => 'Belarusian',
            'bn' => 'Bengali',
            'bs' => 'Bosnian',
            'bg' => 'Bulgarian',
            'ca' => 'Catalan',
            'ceb' => 'Cebuano',
            'ny' => 'Chichewa',
            'zh-CN' => 'Chinese (Simplified)',
            'zh-TW' => 'Chinese (Traditional)',
            'co' => 'Corsican',
            'hr' => 'Croatian',
            'cs' => 'Czech',
            'da' => 'Danish',
            'nl' => 'Dutch',
            'en' => 'English',
            'eo' => 'Esperanto',
            'et' => 'Estonian',
            'tl' => 'Filipino',
            'fi' => 'Finnish',
            'fr' => 'French',
            'fy' => 'Frisian',
            'gl' => 'Galician',
            'ka' => 'Georgian',
            'de' => 'German',
            'el' => 'Greek',
            'gu' => 'Gujarati',
            'ht' => 'Haitian Creole',
            'ha' => 'Hausa',
            'haw' => 'Hawaiian',
            'iw' => 'Hebrew',
            'hi' => 'Hindi',
            'hmn' => 'Hmong',
            'hu' => 'Hungarian',
            'is' => 'Icelandic',
            'ig' => 'Igbo',
            'id' => 'Indonesian',
            'ga' => 'Irish',
            'it' => 'Italian',
            'ja' => 'Japanese',
            'jw' => 'Javanese',
            'kn' => 'Kannada',
            'kk' => 'Kazakh',
            'km' => 'Khmer',
            'ko' => 'Korean',
            'ku' => 'Kurdish (Kurmanji)',
            'ky' => 'Kyrgyz',
            'lo' => 'Lao',
            'la' => 'Latin',
            'lv' => 'Latvian',
            'lt' => 'Lithuanian',
            'lb' => 'Luxembourgish',
            'mk' => 'Macedonian',
            'mg' => 'Malagasy',
            'ms' => 'Malay',
            'ml' => 'Malayalam',
            'mt' => 'Maltese',
            'mi' => 'Maori',
            'mr' => 'Marathi',
            'mn' => 'Mongolian',
            'my' => 'Myanmar (Burmese)',
            'ne' => 'Nepali',
            'no' => 'Norwegian',
            'ps' => 'Pashto',
            'fa' => 'Persian',
            'pl' => 'Polish',
            'pt' => 'Portuguese',
            'pa' => 'Punjabi',
            'ro' => 'Romanian',
            'ru' => 'Russian',
            'sm' => 'Samoan',
            'gd' => 'Scottish Gaelic',
            'sr' => 'Serbian',
            'st' => 'Sesotho',
            'sn' => 'Shona',
            'sd' => 'Sindhi',
            'si' => 'Sinhala',
            'sk' => 'Slovak',
            'sl' => 'Slovenian',
            'so' => 'Somali',
            'es' => 'Spanish',
            'su' => 'Sundanese',
            'sw' => 'Swahili',
            'sv' => 'Swedish',
            'tg' => 'Tajik',
            'ta' => 'Tamil',
            'te' => 'Telugu',
            'th' => 'Thai',
            'tr' => 'Turkish',
            'uk' => 'Ukrainian',
            'ur' => 'Urdu',
            'uz' => 'Uzbek',
            'vi' => 'Vietnamese',
            'cy' => 'Welsh',
            'xh' => 'Xhosa',
            'yi' => 'Yiddish',
            'yo' => 'Yoruba',
            'zu' => 'Zulu'
        ];
    }
}
