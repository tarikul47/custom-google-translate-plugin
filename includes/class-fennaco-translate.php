<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Fennaco_Translate
{

    private static $instance = null;

    private function __construct()
    {
        $this->includes();
        $this->hooks();
    }

    public static function get_instance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function includes()
    {
        require_once FENNACO_TRANSLATE_PLUGIN_DIR . 'includes/class-fennaco-translate-admin.php';
        require_once FENNACO_TRANSLATE_PLUGIN_DIR . 'includes/class-fennaco-translate-frontend.php';
    }

    private function hooks()
    {
        // Admin menu and settings
        add_action('admin_menu', array('Fennaco_Translate_Admin', 'add_admin_menu'));
        add_action('admin_init', array('Fennaco_Translate_Admin', 'settings_init'));

        // Shortcode for language switcher
        add_shortcode('fennaco_translate_switcher', array('Fennaco_Translate_Frontend', 'render_language_switcher'));

        // Enqueue scripts for the frontend
        add_action('wp_enqueue_scripts', array('Fennaco_Translate_Frontend', 'enqueue_scripts'));
    }
}

Fennaco_Translate::get_instance();
