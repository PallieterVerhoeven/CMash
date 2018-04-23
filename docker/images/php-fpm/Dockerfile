FROM phalconphp/php-fpm:7.0-min
WORKDIR "/src"

RUN apt-get update

# install mysql and opcache
RUN docker-php-ext-install opcache