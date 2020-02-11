# Docker Compose - LAMP Stack

Basic LAMP stack environment built using Docker Compose. It consists of the following:

* PHP 7.2
* Apache 2.4
* MySQL 5.7
* phpMyAdmin

## Installation

Clone this repository on your local computer and switch to branch `7.2.x`.
Run `docker-compose build` and then run `docker-compose up -d`.

```shell
$ git clone https://github.com/vaiosparavaitsis/docker-compose-lamp.git
$ cd docker-compose-lamp/
$ git fetch --all
$ git checkout 7.2.x
$ docker-compose build
$ docker-compose up -d
```

Your LAMP stack is now ready!! You can access it via `http://localhost:8080`.

## Configuration

This package comes with default configuration options. You can modify them by creating the `.env` file in your root directory.

To make it easy, just copy the content from `sample.env` file and update the environment variable values as per your need.

### Configuration Variables

There are the following configuration variables available and you can customize them by overwriting your own `.env` file.

_**PROJECT_ENV**_

It is the current main environment that is used, with the current setup it can get two values `dev` and `prod`. By default is `dev`.

_**DOCUMENT_ROOT**_

It is the document root for Apache server. The default value for this is `./www`. All your sites will go here and will be synced automatically.

_**MYSQL_DATA_DIR**_

This is the MySQL data directory. The default value for this is `./data/mysql`. All your MySQL data files will be stored here.

_**VHOSTS_DIR**_

This is for virtual hosts. The default value for this is `./config/vhosts`. You can place your virtual hosts conf files here.

> Make sure you add an entry to your system's `hosts` file for each virtual host.

_**APACHE_LOG_DIR**_

This will be used to store Apache logs. The default value for this is `./logs/apache2`.

_**MYSQL_LOG_DIR**_

This will be used to store MySQL logs. The default value for this is `./logs/mysql`.

_**PHP_INI**_

This is for custom settings in the server. The default value for this is `./config/php/php.ini`.

_**PROJECT_NAME**_

This will be used for the name of your project and as a variable for the container names.

_**PORT_PHP_HTTP**_

Default port is `8080`.

_**PORT_PHP_SSL**_

Default port is `443`.

_**PORT_MYSQL**_

Default port is `33061`.

_**PORT_PHPMYADMIN**_

Default port is `8090`.

_**PORT_REDIS**_

Default port is `6379`.

All the above are the ports that will be used for the different stacks.

## Configure the .env file

Currently `.env` and `.env.*` are ignored

To use this stack properly you need a `.env` file in the root. Just copy and paste the `sample.env`

`$ cp sample.env .env` or `$ mv sample.env .env` to rename it

***Remember:** Docker will always load by default the `.env` file, in order to change that run the `--env-file` flag or add the `env_file` parameter in your `docker-compose.yml` container configuration*

***Note:** Do not put and commit secrets to your `.env` files*

More referenced here: https://docs.docker.com/compose/environment-variables/

## Configure the docker-compose.yml

If you want to separate your config files, you'll have to create different `docker-compose.yml` files e.g. `docker-compose.prod.yml` or `docker-compose.local.yml`

To load the new configuration file, instead of running the main compose command you'll have to add the `-f` flag with the path to the new configuration file

To build, start and stop the containers

```
$ docker-compose -f docker-compose.prod.yml build
$ docker-compose -f docker-compose.prod.yml up -d
$ docker-compose -f docker-compose.prod.yml down
```

***Remember:** Docker will always load by default the `docker-compose.yml` if you don't specify the `-f` flag*

## Changing docker installation

You can also add docker inside your `www` project to run, just add the docker project to your root of your project and change the `DOCUMENT_ROOT` to where your project root is located. In our example will be `../`

## Templating - TODO

Currently there is no templating so in order to create blocks change the following

Got to and add `/config/{your_env}/vhosts/example.com.conf` then add your configuration

Add a volume to your php container inside `docker-compose.yml` like this `- ${DOCUMENT_ROOT}/example.com:/var/www/html/example.com:cached`

Add your project to `www` as `example.com` your project root

## Web Server

Apache is configured to run on port 8080. So, you can access it via `http://localhost:8080`.

#### Apache Modules

By default following modules are enabled.

* rewrite
* headers

> If you want to enable more modules, just update `./bin/php/Dockerfile`. You can also generate a PR and will merge if seems good for general purpose.
> You have to rebuild the docker image by running `docker-compose build` and restart the docker containers.

#### Connect via SSH

You can connect to web server using `docker exec` command to perform various operations on it. Use the command below to login to the container via ssh.

```shell
docker exec -it php-projectname /bin/bash
```

## PHP

The installed version of PHP is 7.2.

#### Extensions

By default following extensions are installed.

* mysqli
* mbstring
* zip
* intl
* mcrypt
* curl
* json
* iconv
* xml
* xmlrpc
* gd
* ctype
* openssl
* tokenizer
* opcache

> If you want to install more extension, just update `./bin/php/Dockerfile`. You can also generate a PR and will merge if seems good for general purpose.
> You have to rebuild the docker image by running `docker-compose build` and restart the docker containers.

## phpMyAdmin

phpMyAdmin is configured to run on port 8090. Use following default credentials.

```shell
http://localhost:8090/  
Username: root  
Password: root
```

## Redis

It also comes with Redis. It runs on default port `6379`.
