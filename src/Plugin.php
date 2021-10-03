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
	 * Plugin's singleton instance
	 *
	 * @var object
	 */
	private static $instance;

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
		if ( self::$instance === null ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
}