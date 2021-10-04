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
		add_action( 'after_setup_theme', [ $this, 'init' ] );
        add_action( 'carbon_fields_register_fields', [ $this, 'load_fields' ] );
	}

	/**
	 * Set up Carbon Fields
	 *
	 * @return void
	 */
	public function init() {
        \Carbon_Fields\Carbon_Fields::boot();
    }

	/**
     * Load plugin fields
     *
     * @return void
     */
    public function load_fields() {
        Container::make( 'theme_options', $this->plugin->get_title() )

		->set_page_menu_position( 3 )
    }
}
