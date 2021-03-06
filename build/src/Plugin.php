<?php
/**
 * Plugin class.
 *
 * @package SlackBot
 */

namespace SlackBot;

use Maknz\Slack\Client;

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
	 * Private instance of admin class
	 *
	 * @var object
	 */
	private $admin;

	/**
	 * Setup the plugin.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->admin = new Admin( $this );
		add_action( 'publish_post', [ $this, 'notify_my_slack' ], 10, 2 );
	}

	/**
	 * Notify Slack
	 *
	 * @param int    $post_id WP Post ID.
	 * @param object $post WP Post Object.
	 *
	 * @return void
	 */
	public function notify_my_slack( $post_id, $post ) {
		$slack_hook    = $this->admin->get_webhook();
		$slack_message = 'New Post alert | %3$s: *%2$s* - %1$s';
		$slack_message = sprintf( $slack_message, get_permalink( $post_id ), $post->post_title, $post->post_date );
		$logo          = $this->admin->get_logo() ? $this->admin->get_logo() : ':ghost';
		$settings      = [
			'username' => $this->admin->get_username(),
			'channel'  => $this->admin->get_channel(),
		];
		$client        = new Client( $slack_hook, $settings );

		$client->withIcon( $logo )->send( $slack_message );
	}

	/**
	 * Plugin Entry point based on Singleton
	 *
	 * @return Plugin $plugin Instance of the plugin abstraction.
	 */
	public static function init() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Get Plugin Title
	 *
	 * @return string
	 */
	public function get_title() {
		return __( 'Slack Bot', 'slack-bot' );
	}

	/**
	 * Get Plugin Description
	 *
	 * @return string
	 */
	public function get_description() {
		return __( 'The Slack Bot plugin is a simple notification plugin built to help alert WordPress site owners when posts have been created or published. It sends a simple notification message to the specified slack channel via your Slack webhook. To get your Slack webhook, please visit the Slack API page.', 'slack-bot' );
	}

	/**
	 * Get Plugin Author
	 *
	 * @return string
	 */
	public function get_author() {
		return __( 'Chigozie Orunta', 'slack-bot' );
	}
}
