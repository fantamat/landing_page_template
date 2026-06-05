FROM php:8.2-fpm-alpine

# Install nginx and required PHP extensions
RUN apk add --no-cache nginx

# Configure nginx
COPY ./docker/nginx.conf /etc/nginx/http.d/default.conf

# Create directory for nginx to store runtime files
RUN mkdir -p /var/run/nginx

# Copy application files
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html

# Set permissions
RUN chown -R www-data:www-data /var/www/html

# Expose port 80
EXPOSE 80

# Create startup script
RUN echo "#!/bin/sh\nnginx\nphp-fpm\ntail -f /var/log/nginx/access.log" > /start.sh && \
    chmod +x /start.sh

# Start services
CMD ["/start.sh"]