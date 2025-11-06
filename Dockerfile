FROM php:8.2-fpm-alpine
WORKDIR /var/www/html

# 1. Instala dependências + sqlite
RUN apk add --no-cache \
    libpng-dev libjpeg-turbo-dev freetype-dev \
    zip unzip \
    sqlite sqlite-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo pdo_mysql pdo_sqlite

# 2. Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 3. Copia app + .env
COPY . .

# 4. Instala dependências
RUN composer install --optimize-autoloader --no-dev


RUN mkdir -p storage/database storage/framework/cache/data storage/framework/sessions storage/framework/views
# 5. Cria usuário com UID/GID do host
ARG USER_ID=1000
ARG GROUP_ID=1000
RUN addgroup -g ${GROUP_ID} -S appgroup && \
    adduser -u ${USER_ID} -S appuser -G appgroup

# # 6. Gera chave + DB + migrate + Telescope
# RUN php artisan key:generate  \
#     && touch storage/database.sqlite \
#     && php artisan migrate \
#     && php artisan telescope:install

# 7. Permissões (DEPOIS do usuário)
RUN chown -R appuser:appgroup storage bootstrap/cache .env \
    && chmod -R 775 storage bootstrap/cache \
    && chmod 664 .env || true

# Copy entrypoint script to handle runtime tasks (generate key, create sqlite file, migrations)
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# 8. Roda como appuser
USER appuser

ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]

EXPOSE 9000
CMD ["php-fpm"]