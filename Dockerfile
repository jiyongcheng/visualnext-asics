FROM php:7.1-fpm

# PHP configuration
ADD ./docker/php/php.ini /usr/local/etc/php/php.ini

# Install server dependencies
RUN \
    apt-get update && \
    apt-get install -y \
    curl git imagemagick libcurl4-gnutls-dev libmagickcore-dev libmagickwand-dev libmcrypt-dev libicu-dev \
    libpng-dev libssh2-1-dev libssl-dev libxml2-dev wget

# Install php extensions
RUN docker-php-ext-install curl gd intl mbstring mcrypt pcntl pdo pdo_mysql soap sockets xml zip

# Install pecl packages
RUN pecl install imagick-3.4.3 mongodb-1.2.10 redis-3.1.3 ssh2-1.1.2 && \
    docker-php-ext-enable imagick mongodb redis ssh2

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add project files and set work directory
ADD . /app
WORKDIR /app

# Fix up web file permissions
RUN chown -R www-data:www-data src/app/etc src/var src/media
RUN chmod -R go+rw src/app/etc src/var src/media

# Clean up
RUN rm -rf /var/lib/apt/lists/*