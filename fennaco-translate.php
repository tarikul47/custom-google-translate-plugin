<?php
/**
 * Plugin Name: Fennaco Translate
 * Description: A WordPress plugin to manage language translations and provide a language switcher.
 * Version: 1.0
 * Author: Your Name
 * Text Domain: fennaco-translate
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

define('FENNACO_TRANSLATE_VERSION', '1.0');
define('FENNACO_TRANSLATE_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('FENNACO_TRANSLATE_PLUGIN_URL', plugin_dir_url(__FILE__));

require_once FENNACO_TRANSLATE_PLUGIN_DIR . 'includes/class-fennaco-translate.php';

function fennaco_translate_init()
{
    Fennaco_Translate::get_instance();
}
add_action('plugins_loaded', 'fennaco_translate_init');
