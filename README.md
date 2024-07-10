# Symfony5 + Docker + PostgreSQL + Hexagonal Arch

This README provides instructions on how to start and run the project, as well as an overview of the technologies used.

## Running with docker

### Requirements
- [Docker](https://docs.docker.com/engine/install)

### Installation
Run docker-compose command:
```sh
docker-compose up -d
```

**Default ports**
| Name      | Port   | Exposed |
|-----------|--------|---------|
| `nginx`   | `8000` | `yes`   |
| `php-fpm` | `9000` | `no`    |
| `postgres`| `5432` | `yes`   |


## Running without docker 
### Requirements
- [PHP](https://www.php.net/downloads.php)
- [Composer](https://getcomposer.org/download)
- [PostgreSQL](https://www.postgresql.org/download/)

With PHP extensions:
- xml
- pgsql

### Installation
Install dependencies: 
```sh
composer install
```

### Migrations
Use the command:
```sh
php bin/console doctrine:migration:migrate
```

### Running
Use the command:
```sh
php -S 127.0.0.1:8000 -t public/ 
```

