# Campaign management api

## Prerequisites

- Docker
- Docker Compose

## project Setup

```bash
git clone https://github.com/rozimuhammadweb/campaign-api.git
cd repo
docker-compose up --build
docker-compose up -d
docker-compose exec container_name bash ## for enter php
composer install
php artisan key:generate
cp .env.example .env
php artisan migrate
php artisan db:seed
```

### Note:
- **Seeder**: `UsersTableSeeder.php` file, create `admin` and `company` users and assigns roles.




