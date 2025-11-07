FROM amazonlinux:2023
RUN dnf update -y
RUN dnf install -y php php-fpm php-pgsql php-json php-devel php-gd git g++ php-pear libzip libzip-devel php-intl git zip unzip php-redis
RUN pecl install xdebug zip
RUN mkdir -p /run/php-fpm
COPY ../docker/php/www.conf /etc/php-fpm.d/www.conf
RUN chown nginx:nginx /var/lib/php/session
# composerをインストールしておく
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer