FROM php:8.3-cli

# Install system dependencies
RUN apt-get update -y && \
    apt-get install -y git unzip curl libonig-dev libpq-dev && \
    docker-php-ext-install pdo pdo_mysql pdo_pgsql mbstring && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /app

# Copy app files
COPY . /app

# Install PHP dependencies
RUN composer install

# Migrations
# RUN php artisan migrate

# Key
# RUN php artisan key:generate

# Expose port
EXPOSE 8000

# Start Laravel server
CMD php artisan migrate:fresh --force && \
    # php artisan key:generate && \
    php artisan serve --host=0.0.0.0 --port=8000
