FROM php:8.0.3-fpm-alpine

RUN docker-php-ext-install pdo_mysql

COPY crontab /etc/crontabs/root

CMD ["crond", "-f"]
