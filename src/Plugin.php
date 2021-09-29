<?php
/**
 * Plugin class.
 *
 * @package SlackBot
 */

namespace SlackBot;

/**
 * WordPress plugin interface.
 */
class Plugin {

	/**
	 * Setup the plugin.
	 *
	 * @return void
	 */
	public function __construct() {
		//...
	}

	/**
	 * Plugin Entry point based on Singleton
	 *
	 * @return Plugin $plugin Instance of the plugin abstraction.
	 */
	public static function init() {
		static $instance;
		if ( ! $instance === null ) {
			$instance = new self();
		}
		return instance;
	}
}