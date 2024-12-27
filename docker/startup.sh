#!/bin/sh

php /var/www/artisan migrate --force

sed -i "s,LISTEN_PORT,$PORT,g" /etc/nginx/nginx.conf

php-fpm -D -R

while ! nc -w 1 -z 127.0.0.1 9000; do sleep 0.1; done;

redis-server /var/www/docker/redis.conf --daemonize yes

nginx
