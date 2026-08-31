FROM php:8.3-cli

RUN apt-get update \
    && apt-get install -y --no-install-recommends default-mysql-client \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install mysqli pdo_mysql

WORKDIR /app
COPY . /app/

RUN chmod -R 755 /app/images

EXPOSE 8080

CMD ["sh", "-c", "php -S 0.0.0.0:${PORT:-8080} -t /app"]
