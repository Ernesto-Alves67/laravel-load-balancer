#!/bin/sh
set -e

cd /var/www/html || exit 1

# Create storage directories
mkdir -p storage/database storage/framework/cache/data storage/framework/sessions storage/framework/views

# Ensure .env exists
if [ ! -f .env ]; then
  if [ -f .env.example ]; then
    cp .env.example .env
  else
    touch .env
  fi
fi

# Generate application key if missing
APP_KEY_VALUE=$(grep -E '^APP_KEY=' .env | cut -d= -f2-)
if [ -z "$APP_KEY_VALUE" ] || [ "$APP_KEY_VALUE" = "\n" ]; then
  echo "Generating APP_KEY..."
  php artisan key:generate --ansi --force
fi



# Run migrations and telescope install unless explicitly skipped
if [ "${SKIP_MIGRATIONS:-0}" != "1" ]; then
  echo "Running migrations..."
  php artisan migrate --force || true
  echo "Installing Telescope (if not installed)..."
  php artisan telescope:install --ansi || true
fi

# Cache config and clear cache
php artisan config:cache || true
php artisan cache:clear || true

# Exec the container command (php-fpm)
exec "$@"
