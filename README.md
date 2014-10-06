Corvus
======

[![Build Status](https://travis-ci.org/ilikeprograms/corvus.svg?branch=master)](https://travis-ci.org/ilikeprograms/corvus)
[![Gittip](http://img.shields.io/gittip/ilikeprograms.svg)](https://www.gittip.com/ilikeprograms/)

Corvus is an opinionated, self hosted and free Portfolio Content Management System.
Corvus was created as an alternative to Hosted portfolios, which provide a way to create and customise a portfolio,
but for advanced options/extras require paying.

Create a simple portfolio, link to resources, and show the world what you can do with Corvus.

## Features

* Corvus can be easily customised to make your portfolio Unique. The info, the styles, the showcase.
* A Site Design section to choose themes/templates and a Fully integrated theme editor
* Made to easy to use and tailored to provide what a portfolio needs to. No other bloat
* Navigation is pre created, but you can link to anything your portfolio needs to compliment
* Project and Work history provided a good way to showcase yourself
* Downloads let you gift people your creations *(Coming Soon)*
* You can add your Education and Skills to prove your skillset

## Why choose Corvus?

* Corvus is Free, Open source, and Self hosted. You can do virtually anything you want with it.
* You will never have to pay for Corvus, for upgrades or extras or support. If you value the product, then Contribute or Donate.
* Corvus was designed to manage portfolios, nothing else. You dont need 100's of plugins to make a portfolio. If it cant do what you want, <a href="mailto:%22Corvus%20Support%22%20%3ccorvus-support@ilikeprograms.com%3e?subject=Feature Suggestion">Make a suggesting</a>
* I developed Corvus to use as my Portfolio, because I didn't like Hosted ones. If it needs new features, I will develop them.
* Im better at programming than I am at writing this stuff *(I Hope)*

## Installation

### Cloning the Repo

To begin using Corvus, it needs to be downloaded. The easiest way to do this would be to use git:

```Shell
git clone https://github.com/ilikeprograms/corvus
```

### Installing Dependencies

When the project is finished downloading, the project dependencies need to be installed.

To do that Composer is used to install the depencencies, by running:

```Shell
php composer.phar install
```

*Note*: If you dont have composer installed you can install it using the instructions on the Composer download page:
https://getcomposer.org/download/

### Starting the Development Environment

Corvus uses Vagrant to create and manage a development environment. To get up and, run the following command:

```Shell
vagrant up
```

Optionally run `vagrant ssh` to access the dev environment through ssh.

### Configuring the Database

To automatically create the database and insert the dummy data, **DoctrineMigrations** are used. Run the following command to migrate the Corvus database:

*Note*: When running `vagrant up` this step will automatically be performed.

```Shell
php app/console doctrine:migrations:migrate
```

## Start using Corvus

Everything should now be setup to start using the Application.

In your browser go to:
`http://localhost/app.php` or `http://localhost:3000/app.php` when running Vagrant

By default, there is only one user account and that should have been created in the Configuring the Database section. To login and manage your Corvus installation, use the following account details:

**User**: admin

**Password**: password

To access the backend go to: `http://localhost/app.php/admin` or `http://localhost/app.php/admin` when running Vagrant

## Support/Contact

* [View or Fork Corvus](https://github.com/ilikeprograms/corvus)
* [Corvus Website](http://corvus.ilikeprograms.com)
* <a href="irc://irc.freenode.net/corvus">#corvus on irc.freenode</a>
* <a href="mailto:%22Corvus%20Support%22%20%3ccorvus-support@ilikeprograms.com%3e?subject=Corvus Support">Send us an Email</a> <sup>(corvus-support@ilikeprograms.com)</sup>
* [Stack Overflow](http://stackoverflow.com/questions/tagged/corvus)
* Need Webhosting? We recommend using <a href="https://www.digitalocean.com/?refcode=8ebdbca3d82d" target="_blank">Digital Ocean</a>. You will receive $10 free credit for using the Referral Link.