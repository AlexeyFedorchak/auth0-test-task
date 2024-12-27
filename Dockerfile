FROM php:8.2-fpm-alpine
WORKDIR /var/www

RUN apk add --no-cache nginx wget

RUN apk update update && apk add \
    git \
    curl \
    zip \
    unzip \
    vim

RUN docker-php-ext-install pdo_mysql mysqli exif

RUN apk add libpng-dev

RUN apk add --update nodejs npm

RUN apk add \
        libzip-dev \
        zip \
  && docker-php-ext-install zip

RUN apk add --no-cache shadow libzip libpng libjpeg-turbo libwebp freetype
RUN apk add --no-cache --virtual build-essentials \
    icu-dev icu-libs zlib-dev g++ make automake autoconf libzip-dev \
    libpng-dev libwebp-dev libjpeg-turbo-dev freetype-dev && \
    docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg --with-webp && \
    docker-php-ext-install gd

RUN apk update && apk add redis

RUN apk update && apk add --no-cache supervisor
RUN pecl install redis && docker-php-ext-enable redis

COPY docker/supervisord.conf /etc/supervisor/supervisord.conf
COPY docker/zzz-docker.conf /usr/local/etc/php-fpm.d/zzz-docker.conf

RUN mkdir -p /run/nginx

COPY docker/nginx.conf /etc/nginx/nginx.conf

ADD docker/crontab.txt /crontab.txt
RUN /usr/bin/crontab /crontab.txt

ADD . /var/www

RUN sh -c "wget http://getcomposer.org/composer.phar && chmod a+x composer.phar && mv composer.phar /usr/local/bin/composer"

ENV COMPOSER_ALLOW_SUPERUSER=1

RUN cd /var/www && /usr/local/bin/composer install

RUN cd /var/www && php artisan optimize:clear
RUN chmod -R 777 /var/www

CMD ["/var/www/docker/startup.sh"]
