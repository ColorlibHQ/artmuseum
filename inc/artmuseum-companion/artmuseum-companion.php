<?php
/*
 * Plugin Name:       Art Museum Companion
 * Plugin URI:        https://colorlib.com/wp/themes/artmuseum/
 * Description:       Art Museum Companion is a companion for Art Museum theme.
 * Version:           1.0
 * Author:            Colorlib
 * Author URI:        https://colorlib.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       artmuseum-companion
 * Domain Path:       /languages
 */

if( !defined( 'WPINC' ) ){
    die;
}

/*************************
    Define Constant
*************************/

// Define version constant
if( ! defined( 'ARTMUSEUM_COMPANION_VERSION' ) ) {
    define( 'ARTMUSEUM_COMPANION_VERSION', '1.0' );
}

// Define dir path constant
if( ! defined( 'ARTMUSEUM_COMPANION_DIR_PATH' ) ) {
    define( 'ARTMUSEUM_COMPANION_DIR_PATH', get_parent_theme_file_path() .'/inc/artmuseum-companion/' );
}

// Define inc dir path constant
if( ! defined( 'ARTMUSEUM_COMPANION_INC_DIR_PATH' ) ) {
    define( 'ARTMUSEUM_COMPANION_INC_DIR_PATH', ARTMUSEUM_COMPANION_DIR_PATH . 'inc/' );
}

// Define sidebar widgets dir path constant
if( ! defined( 'ARTMUSEUM_COMPANION_SW_DIR_PATH' ) ) {
    define( 'ARTMUSEUM_COMPANION_SW_DIR_PATH', ARTMUSEUM_COMPANION_INC_DIR_PATH . 'sidebar-widgets/' );
}

// Define elementor widgets dir path constant
if( ! defined( 'ARTMUSEUM_COMPANION_EW_DIR_PATH' ) ) {
    define( 'ARTMUSEUM_COMPANION_EW_DIR_PATH', ARTMUSEUM_COMPANION_INC_DIR_PATH . 'elementor-widgets/' );
}

// Define demo data dir path constant
if( ! defined( 'ARTMUSEUM_COMPANION_DEMO_DIR_PATH' ) ) {
    define( 'ARTMUSEUM_COMPANION_DEMO_DIR_PATH', ARTMUSEUM_COMPANION_INC_DIR_PATH . 'demo-data/' );
}

// Define dir inc url constant
if( ! defined( 'ARTMUSEUM_COMPANION_DIR_URL' ) ) {
    define( 'ARTMUSEUM_COMPANION_DIR_URL', get_template_directory_uri(). '/inc/artmuseum-companion/' );
}
// Define dir inc url constant
if( ! defined( 'ARTMUSEUM_COMPANION_DIR_INC_URL' ) ) {
    define( 'ARTMUSEUM_COMPANION_DIR_INC_URL', ARTMUSEUM_COMPANION_DIR_URL. 'inc/' );
}

// Define dir url constant
if( ! defined( 'ARTMUSEUM_COMPANION_DIR_META_URL' ) ) {
    define( 'ARTMUSEUM_COMPANION_DIR_META_URL', ARTMUSEUM_COMPANION_DIR_INC_URL. 'artmuseum-meta/' );
}

// Define dir Companion demo data  constant
if( ! defined( 'ARTMUSEUM_COMPANION_DIR_DEMO_DATA_URL' ) ) {
    define( 'ARTMUSEUM_COMPANION_DIR_DEMO_DATA_URL', ARTMUSEUM_COMPANION_DIR_INC_URL. 'demo-data/' );
}

// Define dir Companion Elementor Widget constant
if( ! defined( 'ARTMUSEUM_COMPANION_DIR_ELEMENTOR_URL' ) ) {
    define( 'ARTMUSEUM_COMPANION_DIR_ELEMENTOR_URL', ARTMUSEUM_COMPANION_DIR_INC_URL. 'elementor-widgets/' );
}



require_once ARTMUSEUM_COMPANION_DIR_PATH . 'artmuseum-init.php';



