docker-compose up -d --build

-- ssh into it
docker-compose exec php-apache /bin/bash


--setups laravel
composer create-project laravel/laravel

-- get into mysql box
docker-compose exec database-mysql /bin/bash
mysql -u root -p
password: example

-- get into docker box
docker-compose exec database-postgres /bin/bash
psql -U postgres
-- known password of secret