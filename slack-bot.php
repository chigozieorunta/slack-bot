<?php
/**
 * Plugin Name: Slack Bot
 * Description: Slack Bot for WordPress.
 * Version: 1.0.0
 * Author: Chigozie Orunta
 * Author URI: https://github.com/chigozieorunta/slack-bot
 * Text Domain: slack-bot
 *
 * @package SlackBot
 */

// Support for site-level autoloading.
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

\SlackBot\Plugin::init();
