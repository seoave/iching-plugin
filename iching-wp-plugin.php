<?php

/*
 * Plugin Name: IChing WP Plugin
 * Plugin URI: https://github.com/iching/iching-wp-plugin
 * Description: This is a plugin for IChing
 * Version: 1.0.0
 * Requires at least: 6.4
 * Requires PHP: 8.0
 * Author: Oleksandr Burkhan.
 * Author URI: https://github.com/iching
 * License: GPLv2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: The gettext text domain of the plugin. More information can be found in the Text Domain section of the How to Internationalize your Plugin page.
 * Domain Path: The domain path lets WordPress know where to find the translations.
 * Update URI: https://github.com/iching/iching-wp-plugin
 * Requires Plugins: No
 */

if (!defined('ABSPATH')) {
    exit;
}

// Constants
define( 'ICHING_ASSETS_URL', plugins_url( '/assets', __FILE__ ) );

use classes\IchingPlugin;

require_once __DIR__ . '/classes/IchingPlugin.php';

(new IchingPlugin())->init();

