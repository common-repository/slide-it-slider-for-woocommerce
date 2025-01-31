<?php
/**
 * Plugin Name: Slide it! Slider For WooCommerce
 * @author: Kesc23
 * Description: Put an useful, beautiful & responsive slider to show products inside your store.
 * Author URI: https://felizex.press
 * Plugin URI: https://felizex.press/slide-it
 * Text Domain: slide-it-slider-for-woocommerce
 * @copyright: Copyright (c) 2021, Kesc23
 * @version: 2.3.0
 * @license: GPL v3.0 or Later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 */

if( ! defined( 'ABSPATH' ) ): exit; endif;

/**
 * Declares the plugin version
 */
$slide_it_version = '2.3.0';

/**
 * Defines the plugin root path
 * 
 * @since 0.7.0
 * @since 2.1.0 Changed WPCDIR to slideIT_DIR
 */

if ( ! defined('slideIT_DIR'))
{
    define( 'slideIT_DIR', __DIR__ . '/' );
}

/**
 * Defines Admin path to the plugin
 * 
 * @since 0.7.0
 * @since 2.1.0 Changed WPCADMIN to slideIT_ADMIN
 */
if ( ! defined('slideIT_ADMIN') )
{
    define( 'slideIT_ADMIN', slideIT_DIR . 'admin' . '/');
}

/**
 * Defines includes path to the plugin
 * 
 * @since 0.7.0
 * @since 2.1.0 Changed WPCINC to slideIT_INC
 */
if ( ! defined( 'slideIT_INC' ))
{
    define( 'slideIT_INC', slideIT_DIR . 'includes' . '/' );
}

/**
 * Loads the main scripts to run the plugin
 */

require_once slideIT_INC . 'slide-it-functions.php';

require_once slideIT_INC . 'slide-it-shortcodes.php';

require_once slideIT_ADMIN . 'admin-functions.php';

require_once slideIT_ADMIN . 'ajax-shortcode-response.php';

add_action( 'wp_loaded', 'slide_it_shortcode_generator_ajax', 1 );

require_once 'slide-it-deactivation.php';

/**
 * @since 0.7.1 Action hooks added to correct some mess from 0.7.0
 * 
 * @since 0.7.2 hook wpc_activated to correct another mess
 * @since 1.0.0 added a cleaner way to load styles in WPC admin page.
 * @since 1.0.1 hook wpc_activated was excluded due to bugs in wp while loading.
 */
add_action( 'wp_loaded', 'slideIT_scripts_register');

add_action( 'wp_enqueue_scripts', 'slideIT_scripts');

add_action( 'wp_loaded', 'slideIT_activated', 0 );

add_action( 'admin_enqueue_scripts', 'slideIT_admin_style');

//Added to dequeue and deregister scripts when deactivating.
register_deactivation_hook( __FILE__, 'slideITOnDeactivate' );
