FROM php:8.2-fpm
WORKDIR /var/www/html
RUN docker-php-ext-install pdo pdo_mysql
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN apt-get update && apt-get install -y supervisor \
                                        zlib1g-dev \
                                        libzip-dev \
                                        unzip  \
    && mkdir -p /var/log/supervisor \
RUN docker-php-ext-install zip
COPY . /var/www/html
RUN composer install
CMD ["/usr/bin/supervisord", "-n"]
EXPOSE 9000
CMD ["php-fpm"]
