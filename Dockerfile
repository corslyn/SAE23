FROM composer

RUN mkdir -p /var/www/html

WORKDIR /var/www/html

COPY . .

RUN cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini

RUN docker-php-ext-install pdo_mysql mysqli
RUN apk --no-cache add pcre-dev ${PHPIZE_DEPS}

RUN apk add $PHPSIZE_DEPS

RUN apk add imagemagick-dev

RUN mkdir -p /usr/src/php/ext/imagick

RUN curl -fsSL https://pecl.php.net/get/imagick | tar xvz -C "/usr/src/php/ext/imagick" --strip 1

RUN docker-php-ext-install imagick

RUN composer update

RUN composer install --no-dev

RUN apk add mariadb-client
RUN mv wait-for-mysql.sh /

RUN echo "/wait-for-mysql.sh" > /init.sh

RUN echo "php artisan serve --host 0.0.0.0 --port 80" >> /init.sh

RUN chmod +x /wait-for-mysql.sh
RUN chmod +x /init.sh

CMD ["/init.sh"]
