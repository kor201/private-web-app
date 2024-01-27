FROM php:8.2-fpm
ENV TZ Asia/Tokyo
RUN apt-get update && \
    apt-get install -y libzip-dev unzip  wget git unzip libicu-dev libmemcached-dev zlib1g-dev libssl-dev libmagickwand-dev && \
    docker-php-ext-install zip pdo_mysql sockets opcache intl && \
    pecl install memcached && \
    docker-php-ext-enable memcached && \
    pecl install imagick && \
    docker-php-ext-enable imagick && \
    pecl install xdebug && \
    docker-php-ext-enable xdebug && \
    docker-php-ext-configure gd && \
    docker-php-ext-install -j$(nproc) gd && \
    apt-get clean && rm -rf /var/lib/apt/lists/*
RUN git clone https://github.com/phpredis/phpredis.git /usr/src/php/ext/redis && \
    docker-php-ext-install redis && \
    rm -rf /usr/src/php/ext/redis
RUN apt-get update && \
    apt-get install -y imagemagick poppler-utils jpegoptim optipng vim cron logrotate && \
    ln -s /usr/bin/optipng /usr/local/bin/optipng && \
    ln -s /usr/bin/jpegoptim /usr/local/bin/jpegoptim && \
    apt-get clean && rm -rf /var/lib/apt/lists/*
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer