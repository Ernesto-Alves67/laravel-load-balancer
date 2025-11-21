#!/bin/sh
set -e

cd /var/www/html || exit 1

#########################################
# 1. Garantir pastas essenciais
#########################################

mkdir -p storage \
         storage/app \
         storage/framework \
         storage/framework/cache/data \
         storage/framework/sessions \
         storage/framework/views \
         storage/logs \
         bootstrap/cache

#########################################
# 2. Garantir permissões corretas
#########################################

# Usa o UID/GID do usuário atual do container (appuser)
chown -R "$(id -u):$(id -g)" storage bootstrap/cache
chmod -R 775 storage bootstrap/cache || true

#########################################
# 3. NÃO gerar .env, NÃO gerar APP_KEY,
#    NÃO rodar migrations,
#    NÃO rodar telescope:install
#    (isso deve ser feito manualmente, 1 vez)
#########################################

#########################################
# 4. NÃO fazer config:cache/cache:clear
#    no entrypoint (quebra cluster)
#########################################

#########################################
# 5. Apenas continuar para o comando final
#########################################

exec "$@"
