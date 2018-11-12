<?php

/**
 * Epsilon Dashboard  Autoloader
 *
 * @package Art Museum
 * @since   1.0
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Class Epsilon_Dashboard_Autoloader
 */
class Epsilon_Dashboard_Autoloader {
	/**
	 * Epsilon_dashboard_Autoloader constructor.
	 */
	public function __construct() {

		spl_autoload_register( array( $this, 'load' ) );
	}

	/**
	 * This function loads the necessary files
	 *
	 * @param string $class CLASS NAME.
	 */
	public function load( $class = '' ) {

		/**
		 * All classes are prefixed with
		 */
		$parts = explode( '_', $class );
		$bind  = implode( '-', $parts );

		/**
		 * We provide working directories
		 */
		$directories = array(
			ARTMUSEUM_DIR_PATH_LIBS,
			ARTMUSEUM_DIR_PATH_LIBS . 'epsilon-framework/',
			ARTMUSEUM_DIR_PATH_LIBS . 'epsilon-theme-dashboard/',
			ARTMUSEUM_DIR_PATH_LIBS . 'epsilon-theme-dashboard/inc/',
			ARTMUSEUM_DIR_PATH_LIBS . 'epsilon-theme-dashboard/inc/helpers/',
			ARTMUSEUM_DIR_PATH_LIBS . 'epsilon-theme-dashboard/inc/misc/',
			ARTMUSEUM_DIR_PATH_LIBS . 'epsilon-theme-dashboard/inc/misc/demo-generators/',
			ARTMUSEUM_DIR_PATH_LIBS . 'epsilon-theme-dashboard/inc/misc/epsilon-tracking/',
			ARTMUSEUM_DIR_PATH_LIBS . 'epsilon-theme-dashboard/inc/misc/epsilon-tracking/trackers/',
		);

		/**
		 * Loop through them, if we find the class .. we load it !
		 */
		foreach ( $directories as $directory ) {
			if ( file_exists( $directory . 'class-' . strtolower( $bind ) . '.php' ) ) {
				require_once $directory . 'class-' . strtolower( $bind ) . '.php';

				return;
			}
		}


	}
}

new Epsilon_Dashboard_Autoloader();
