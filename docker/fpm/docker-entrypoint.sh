#!/bin/sh
set -e

# Instala as dependências do Composer
composer install

# Executa as migrações do Doctrine
bin/console doctrine:migrations:migrate --no-interaction

# Inicia o PHP-FPM
exec php-fpm
