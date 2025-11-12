FROM amazonlinux:2023
RUN dnf update -y
RUN dnf install -y php \
                   php-devel \
                   php-fpm \
                   php-gd \
                   php-intl \
                   php-json \
                   php-pear \
                   php-pgsql \
                   php-redis \
                   php-zip \
                   git \
                   g++ \
                   zip \
                   unzip \
                   libzip \
                   libzip-devel
RUN mkdir -p /run/php-fpm
COPY ../docker/php/www.conf /etc/php-fpm.d/www.conf
RUN chown nginx:nginx /var/lib/php/session
# composerをインストールしておく
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer