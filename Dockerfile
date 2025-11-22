FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libssl-dev

RUN docker-php-ext-install pdo_mysql mbstring bcmath zip sockets openssl

COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN composer install --no-interaction --prefer-dist --optimize-autoloader

COPY start.sh /start.sh
RUN chmod +x /start.sh

CMD ["/start.sh"]
