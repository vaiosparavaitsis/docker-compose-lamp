FROM php:7.2-apache

RUN apt-get -y update --fix-missing && \
    apt-get upgrade -y && \
    # Install useful tools
    apt-get -y install apt-utils nano wget dialog && \
    # Install important libraries
    apt-get -y install --fix-missing apt-utils build-essential git curl libcurl4 libcurl4-openssl-dev zip openssl && \
    # Composer
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    # Install xdebug
    pecl install xdebug-2.6.0 && \
    docker-php-ext-enable xdebug && \
    # Install redis
    pecl install redis-4.0.1 && \
    docker-php-ext-enable redis && \
    # Other PHP7 Extensions
    apt-get -y install libsqlite3-dev libsqlite3-0 mariadb-client && \
    docker-php-ext-install pdo && \
    docker-php-ext-install pdo_mysql && \
    docker-php-ext-install pdo_sqlite && \
    docker-php-ext-install mysqli && \
    docker-php-ext-install curl && \
    docker-php-ext-install tokenizer && \
    docker-php-ext-install json && \
    docker-php-ext-install ctype && \
    docker-php-ext-install opcache && \
    apt-get -y install zlib1g-dev && \
    docker-php-ext-install zip && \
    apt-get -y install libicu-dev && \
    docker-php-ext-install -j$(nproc) intl && \
    docker-php-ext-install mbstring && \
    docker-php-ext-install gettext && \
    apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev && \
    docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ && \
    docker-php-ext-install -j$(nproc) gd && \
    # Enable the available sites
    ln -s /etc/apache2/sites-available/default /etc/apache2/sites-enabled/ && \
    # Enable apache modules
    a2enmod rewrite headers
