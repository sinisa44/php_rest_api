#  docker run --name mysql -v //c/Users/Sinisa/database/mysql:/var/lib/mysql -p 3306:3306 -e MYSQL_ROOT_PASSWORD=secret -d mysql:5.7.22 --innodb_use_native_aio=0  

docker run --rm --name test-app -d -p 9090:80 -v //c/Users/your-name/projects/php_rest_api/src/:/var/www/html --link mysql:mysql php:7.2-apache bash -c "docker-php-ext-install pdo_mysql gd; apache2-foreground"
