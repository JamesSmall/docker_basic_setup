# Generic Docker Setups

this collection of docker containers is a reference / jump off point for me to build applications, these containers are not for production and only for a dev enviroment.

## Intital setup
```bash
docker-compose up -d --build
```

## startup
```bash
docker-compose up -d
```


## SSH example
docker-compose exec <BOX> /bin/bash


## for setup of laravel
composer create-project laravel/laravel

## how to get into the SQL box
docker-compose exec database-mysql /bin/bash
mysql -u root -p
password: example

## how to get into the postgres box
docker-compose exec database-postgres /bin/bash
psql -U postgres
-- known password of secret

## boxes to access
### generic box
this box is to run NPM commands or other commands that I don't want to infect the host system.
### database-mysql
the box that contains a basic MYSQL setup
### database-postgres
the box that contains a basic postgres setup
### php-laravel-apache
the box that contains a functional Laravel PHP app using apache
### vuejs
the box that contains a VUE js setup. used generic box to get the initial vue-js files.
### CACHE
the box that contains a redis setup
