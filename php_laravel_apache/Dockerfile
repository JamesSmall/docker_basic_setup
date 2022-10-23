FROM php:8.0-apache

RUN apt update \
        && apt install -y \
            g++ \
            libicu-dev \
            libpq-dev \
            libzip-dev \
            zip \
            zlib1g-dev \
        && docker-php-ext-install \
            intl \
            opcache \
            pdo \
            pdo_pgsql \
            pgsql
#for cron
RUN apt install -y tzdata cron
#for redis
RUN pecl install redis && docker-php-ext-enable redis

RUN chown -R www-data:www-data /var/www
RUN chmod -R 777 /var/www

# Apply cron job
RUN chown root:root /usr/sbin/cron
RUN cp /usr/share/zoneinfo/US/Central /etc/localtime && \
    echo "US/Central" > /etc/timezone
RUN rm -rf /var/cache/apk/*
COPY laravel-cron /etc/cron.d/laravel-cron
#ADD crontab /etc/cron.d/laravel-cron
# Giving permission to crontab file
RUN chmod 0644 /etc/cron.d/laravel-cron
# Running crontab
RUN usermod -a -G crontab root
RUN crontab /etc/cron.d/laravel-cron

RUN touch /var/log/cron.log

WORKDIR /var/www/docked

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


RUN echo "ServerName laravel-app.local" >> /etc/apache2/apache2.conf

ENV APACHE_DOCUMENT_ROOT=/var/www/docked/public

RUN sed -ri -e 's!/var/www/docked!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 3. mod_rewrite for URL rewrite and mod_headers for .htaccess extra headers like Access-Control-Allow-Origin-
RUN a2enmod rewrite headers
RUN cron

RUN sed -i 's/^exec /service cron start\n\nexec /' /usr/local/bin/apache2-foreground