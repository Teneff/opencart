# MySQL

## init directory

When a container is started for the first time, a new database with the specified name will be created and initialized with the provided configuration variables. Furthermore, it will execute files with extensions .sh, .sql and .sql.gz that are found in [mysql/init][init]. Files will be executed in alphabetical order. You can easily populate your mysql services by mounting a SQL dump into that directory and provide custom images with contributed data. SQL files will be imported by default to the database specified by the MYSQL_DATABASE variable.


## Cheat sheet

Open interactive mysql terminal

```sh
docker exec -it opencart-mysql sh -c 'exec mysql -uroot -p"$MYSQL_ROOT_PASSWORD"'
```

2. Import specific `.sql`
```sh
docker exec -i opencart-mysql sh -c 'exec mysql -uroot -p"$MYSQL_ROOT_PASSWORD" $MYSQL_DATABASE < /docker-entrypoint-initdb.d/opencart.sql'
```


[init]: ./mysql/init