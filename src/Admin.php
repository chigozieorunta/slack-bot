<?php
/**
 * Admin class.
 *
 * @package SlackBot
 */

namespace SlackBot;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class Admin {

	/**
	 * Plugin instance
	 *
	 * @var object
	 */
	private $plugin;

	/**
	 * Instantiate class
	 *
	 * @return void
	 */
	public function __construct(Plugin $plugin) {
		$this->plugin = $plugin;
	}
}