FROM php:8.3-apache

# Enable Apache modules
RUN a2enmod rewrite headers

# Install PHP extensions commonly needed
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Set ServerName to suppress warning
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Set the document root
WORKDIR /var/www/html

# Copy application files
COPY ./public/ /var/www/html/

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80