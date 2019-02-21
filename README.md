# TC Maker Wordpress Theme

This repository is for the theme and everything you need to do theme
development on your local computer.

## Getting Started

In order to edit this theme, you'll need a few things:

   * a way to run WordPress on your personal computer
   * [Gulp](https://gulpjs.com/)

While you are totally free to install and configure MySQL, Apache, PHP, and WordPress manually, it's probably easier to use [Vagrant](https://www.vagrantup.com/) and [VirtualBox](https://www.virtualbox.org/). If you don't have those tools, install them now, then follow these instructions:

### Start Vagrant

From the directory of this checkout, type

    vagrant up
    
This starts up the vagrant box. If it needs to download a base image, it will do so -- this usually takes around 10 minutes, but you only need to do it once. After it starts up the vagrant machine, it will run a provisioning script to install and configure WordPress and all its dependencies.

### Install Gulp

Gulp is a NodeJS utility that frontend developers use to compile SASS and JavaScript. To use it, you need to install NodeJS and NPM on your local computer. Once that is done, you should be able to install it with these commands:

    npm install gulp-cli -g
    npm install

Then, just type:

    gulp build
    gulp watch

If you don't want to install NodeJS on your local machine, you can also do this from the Vagrant machine, which already has NodeJS installed.

    vagrant ssh
    cd /vagrant
    npm install
    gulp build
    gulp watch

### Shutting Down Vagrant

You should shut down the Vagrant machine when you aren't using it. Use this command:

    vagrant halt

If the Vagrant machine gets messed up somehow, you can destroy it with this command:

    vagrant destroy

It will be recreated the next time you use `vagrant up`.

### Accessing WordPress

Use these URLs:

   * [The WordPress site](http://localhost:4000)
   * [The WordPress admin console](http://localhost:4000/wp-admin) (username: `admin`, password: `admin`)

From the admin panel, go to **Appearance** and then **Themes** to activate the theme.

## Editing the Theme

If you're using Vagrant, then any changes you make to the theme will be instantly visible on the site.
