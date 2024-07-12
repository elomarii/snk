# Use the official PHP Apache image as the base image
FROM php:apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    default-mysql-client \
    && docker-php-ext-install mysqli pdo_mysql

# Copy the current directory contents into the container at /var/www/html
COPY . /var/www/html

# Set working directory
WORKDIR /var/www/html

# Expose ports
EXPOSE 80 443
