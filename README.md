# Slack Bot

The Slack Bot plugin is a simple notification plugin built to help alert WordPress site owners when posts, pages, CPTs have been created or published. It sends a simple notification message to the specified slack channel the user requires it to.

## Requirements

- WordPress 5.0+
- PHP 7.2 or later
- [Composer](https://getcomposer.org) and [Node.js](https://nodejs.org) for dependency management.
- [Docker](https://docs.docker.com/install/) or [Vagrant](https://www.vagrantup.com) with [VirtualBox](https://www.virtualbox.org) for a local development environment.

I suggest using a software package manager for installing the development dependencies such as [Homebrew](https://brew.sh) on MacOS:

	brew install php composer node docker docker-compose

or [Chocolatey](https://chocolatey.org) for Windows:

	choco install php composer node nodejs docker-compose