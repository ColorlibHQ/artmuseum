<?php 
/**
 * @Packge 	   : Art Museum
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
// Block direct access
if( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 *
 * Define constant
 *
 */
 
// Base URI
if( ! defined( 'ARTMUSEUM_DIR_URI' ) ) {
	define( 'ARTMUSEUM_DIR_URI', get_template_directory_uri().'/' );
}

// assets URI
if( ! defined( 'ARTMUSEUM_DIR_ASSETS_URI' ) ) {
	define( 'ARTMUSEUM_DIR_ASSETS_URI', ARTMUSEUM_DIR_URI.'assets/' );
}

// Css File URI
if( ! defined( 'ARTMUSEUM_DIR_CSS_URI' ) ) {
	define( 'ARTMUSEUM_DIR_CSS_URI', ARTMUSEUM_DIR_ASSETS_URI .'css/' );
}

// Js File URI
if( ! defined( 'ARTMUSEUM_DIR_JS_URI' ) ) {
	define( 'ARTMUSEUM_DIR_JS_URI', ARTMUSEUM_DIR_ASSETS_URI .'js/' );
}

// Icon Images
if( ! defined('ARTMUSEUM_DIR_ICON_IMG_URI') ) {
	define( 'ARTMUSEUM_DIR_ICON_IMG_URI', ARTMUSEUM_DIR_ASSETS_URI.'img/icons/' );
}

// Base Directory
if( ! defined( 'ARTMUSEUM_DIR_PATH' ) ) {
	define( 'ARTMUSEUM_DIR_PATH', get_parent_theme_file_path().'/' );
}

//Inc Folder Directory
if( ! defined( 'ARTMUSEUM_DIR_PATH_INC' ) ) {
	define( 'ARTMUSEUM_DIR_PATH_INC', ARTMUSEUM_DIR_PATH.'inc/' );
}

//ArtMuseum libraries Folder Directory
if( ! defined( 'ARTMUSEUM_DIR_PATH_LIBS' ) ) {
	define( 'ARTMUSEUM_DIR_PATH_LIBS', ARTMUSEUM_DIR_PATH_INC.'libraries/' );
}

//Classes Folder Directory
if( ! defined( 'ARTMUSEUM_DIR_PATH_CLASSES' ) ) {
	define( 'ARTMUSEUM_DIR_PATH_CLASSES', ARTMUSEUM_DIR_PATH_INC.'classes/' );
}

//Hooks Folder Directory
if( ! defined( 'ARTMUSEUM_DIR_PATH_HOOKS' ) ) {
	define( 'ARTMUSEUM_DIR_PATH_HOOKS', ARTMUSEUM_DIR_PATH_INC.'hooks/' );
}

//Widgets Folder Directory
if( ! defined( 'ARTMUSEUM_DIR_PATH_WIDGET' ) ) {
	define( 'ARTMUSEUM_DIR_PATH_WIDGET', ARTMUSEUM_DIR_PATH_INC.'widgets/' );
}


/**
 * Include File
 *
 */

require_once( ARTMUSEUM_DIR_PATH_INC . 'breadcrumbs.php' );
require_once( ARTMUSEUM_DIR_PATH_INC . 'widgets-reg.php' );
require_once( ARTMUSEUM_DIR_PATH_INC . 'wp_bootstrap_navwalker.php' );
require_once( ARTMUSEUM_DIR_PATH_INC . 'artmuseum-functions.php' );
require_once( ARTMUSEUM_DIR_PATH_INC . 'commoncss.php' );
require_once( ARTMUSEUM_DIR_PATH_INC . 'support-functions.php' );
require_once( ARTMUSEUM_DIR_PATH_INC . 'wp-html-helper.php' );
require_once( ARTMUSEUM_DIR_PATH_INC . 'wp_bootstrap_pagination.php' );
require_once( ARTMUSEUM_DIR_PATH_INC . 'customizer/customizer.php' );
require_once( ARTMUSEUM_DIR_PATH_CLASSES . 'Class-Enqueue.php' );
require_once( ARTMUSEUM_DIR_PATH_CLASSES . 'Class-Config.php' );
require_once( ARTMUSEUM_DIR_PATH_HOOKS . 'hooks.php' );
require_once( ARTMUSEUM_DIR_PATH_HOOKS . 'hooks-functions.php' );
require_once( ARTMUSEUM_DIR_PATH_INC . 'class-epsilon-dashboard-autoloader.php' );
require_once( ARTMUSEUM_DIR_PATH_INC . 'class-epsilon-init-dashboard.php' );

/**
 * Instantiate Art Museum object
 *
 * Inside this object:
 * Enqueue scripts, Google font, Theme support features, Epsilon Dashboard .
 *
 */

$obj = new ArtMuseum();
