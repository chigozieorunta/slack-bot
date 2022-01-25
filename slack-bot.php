<?php
/**
 * Plugin Name: Slack Bot
 * Plugin URI:  https://github.com/chigozieorunta/slack-bot
 * Description: Notify your Slack channel when posts have been created or published on your WordPress site.
 * Version:     0.1.0
 * Author:      Chigozie Orunta
 * Author URI:  https://github.com/chigozieorunta
 * License:     GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: slack-bot
 * Domain Path: /languages
 *
 * @package SlackBot
 */

// Support for site-level autoloading.
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

\SlackBot\Plugin::init();
