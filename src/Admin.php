<?php
/**
 * Admin class.
 *
 * @package SlackBot
 */

namespace SlackBot;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * WordPress admin page
 */
class Admin {

	/**
	 * Plugin instance
	 *
	 * @var object
	 */
	private $plugin;

	/**
	 * Slack Username
	 *
	 * @var string
	 */
	private $username;

	/**
	 * Slack Channel
	 *
	 * @var string
	 */
	private $channel;

	/**
	 * Slack WebHook
	 *
	 * @var string
	 */
	private $webhook;

	/**
	 * Instantiate class
	 *
	 * @param Plugin $plugin Plugin Instance.
	 *
	 * @return void
	 */
	public function __construct( Plugin $plugin ) {
		$this->plugin = $plugin;
		add_action( 'after_setup_theme', [ $this, 'init' ] );
		add_action( 'carbon_fields_register_fields', [ $this, 'load_fields' ] );
		add_action( 'carbon_fields_register_fields', [ $this, 'set_fields' ] );
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

		->set_page_file( 'slack-bot' )

		->set_page_menu_position( 3 )

		->set_icon( 'dashicons-format-chat' )

		->add_fields(
			array(
				Field::make( 'html', 'crb_title' )
				->set_html( '<strong>' . __( 'Description', 'slack-bot' ) . '</strong>' ),

				Field::make( 'html', 'crb_desc' )
				->set_html( $this->plugin->get_description() ),

				Field::make( 'text', 'crb_slack_username', 'Slack Username' )
				->help_text( 'e.g. John Doe' )
				->set_width( 50 ),

				Field::make( 'text', 'crb_slack_channel', 'Slack Channel' )
				->help_text( 'e.g. general' )
				->set_width( 50 ),

				Field::make( 'text', 'crb_slack_webhook', 'Slack WebHook' )
				->help_text( 'e.g. https://hooks.slack.com/services/xxxxxx' ),
			)
		);
	}

	/**
	 * Retrieve Carbon Field values and set private variables
	 *
	 * @return void
	 */
	public function set_fields() {
		$this->username = carbon_get_theme_option( 'crb_slack_username' );
		$this->channel  = carbon_get_theme_option( 'crb_slack_channel' );
		$this->webhook  = carbon_get_theme_option( 'crb_slack_webhook' );
	}

	/**
	 * Return private username
	 *
	 * @return string
	 */
	public function get_username() {
		return $this->username;
	}

	/**
	 * Return private channel
	 *
	 * @return string
	 */
	public function get_channel() {
		return $this->channel;
	}

	/**
	 * Return private webhook
	 *
	 * @return string
	 */
	public function get_webhook() {
		return $this->webhook;
	}
}
