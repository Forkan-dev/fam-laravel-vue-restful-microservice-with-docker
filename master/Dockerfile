# Set the base image to PHP
FROM php:8.3-fpm

# Set the working directory in the container
WORKDIR /var/www/html

# Copy the application files from the host into the container
COPY . .

# Define the command to run the application
CMD ["php", "artisan", "serve", "--host", "0.0.0.0", "--port", "8001"]

