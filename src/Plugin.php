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
		$this->admin = new Admin($this);
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
        $title = 'Slack Bot';

        return __( $title, 'slack-bot' );
    }

	/**
     * Get Plugin Description
     *
     * @return string
     */
    public function get_description() {
        $description = 'The Slack Bot plugin is a simple notification plugin built to help alert WordPress site owners when posts, pages, CPTs have been created or published. It sends a simple notification message to the specified slack channel via your Slack webhook. To get your Slack webhook, please visit the Slack API page.';

        return __( $description, 'slack-bot' );
    }
}
