# Docker
Docker is a set of platform as a service products that use OS-level virtualization to deliver software in packages called containers. [Read more...][docker]

## Start Development server
1. Build the image
```sh
docker build -t opencart/opencart .
```

2. Run [php development server][php-webserver] within the container

```sh
docker run -p 8000:8000 -d opencart/opencart php -S localhost:8000 .
```

3. Navigate to [http://localhost:8000](http://localhost:8000)

## Using [Composer][composer]

Using composer through Docker ensures using the latest version of composer and removes the necessity of local php/composer installation.

1. Install dependencies through [docker image][composer-image] run:

```sh
docker run --rm -it -v `pwd`:/app composer install
```

2. Add a php dependency
```sh
docker run --rm -it -v `pwd`:/app composer require --dev friendsofphp/php-cs-fixer
```

3. Run composer script
```sh
docker run --rm -it -v `pwd`:/app composer run-script lint
```

[docker]: https://www.docker.com/
[composer]: https://getcomposer.org/
[composer-image]: https://hub.docker.com/_/composer
[php-webserver]: https://www.php.net/manual/en/features.commandline.webserver.php