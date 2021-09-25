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

## Development

This repository includes a WordPress development environment based on [Docker](https://docs.docker.com/install/) that can be run on your computer or inside a [Vagrant](https://www.vagrantup.com/) and [VirtualBox](https://www.virtualbox.org/) wrapper for network isolation and simple `.local` domain names.

1. Clone the plugin repository.

2. Setup the development environment and tools using [Node.js](https://nodejs.org) and [Composer](https://getcomposer.org):

        npm install

Note that both Node.js and PHP 7.2 or later are required on your computer for running the `npm` scripts. Use `npm run docker -- npm install` to run the installer inside a Docker container if you don't have the required version of PHP installed locally.