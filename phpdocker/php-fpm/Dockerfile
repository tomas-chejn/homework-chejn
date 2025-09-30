FROM phpdockerio/php:8.3-fpm
WORKDIR "/application"

RUN apt-get update && apt-get install -y --no-install-recommends \
        unzip \
        git \
        default-mysql-client \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer