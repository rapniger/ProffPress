LifePHP Framework
==============

LifePHP Framework - это простой MVC PHP-фреймворк, предназначенный 
для создания и разработки веб-сайтов. 

### Установка

```sh
$ cd /path/to/htdocs
$ git clone https://github.com/rapniger/ProffPress.git
```

Путь к папке DocumentRoot (для настройки виртуальных хостов):

>для фронтеэнда: ./application/public

Пример настройки виртуального хоста (Apache):

```apache
<VirtualHost *:80>
    <Directory "/var/www/domain">
        AllowOverride All
    </Directory>
    ServerName domain.local
    ServerAdmin webmaster@localhost
    DocumentRoot /var/www/domain/application/public
    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
```

Пример настройки виртуального хоста (Nginx):

```nginx
upstream phpfcgi {
    server unix:/var/run/php/php7.0-fpm.sock;
}

server {
    listen 80;
    root /var/www/domain/application/public;
    index index.php;
    server_name domain.local;

    rewrite ^/index\.php/?(.*)$ /$1 permanent;

    location / {
        index index.php;
        try_files $uri @rewriteap;
    }

    location @rewriteap {
        rewrite  ^(.*)$ /index.php/$1 last;
    }

    location ~ ^/(index)\.php(/|$) {
        fastcgi_pass phpfcgi;
        fastcgi_split_path_info ^(.+\.php)(/.*)$;
        include fastcgi_params;
        fastcgi_param  SCRIPT_FILENAME $document_root$fastcgi_script_name;
    }
}
```

Доступы к БД сохранены в файле **./common/config/main.php**

Дамп базы данных находится в файле **./proffpress.sql**

### Используемые технологии:

 - Веб-сервер
 - PHP 5.5.* или PHP 7.*
 - MySql 5.5.*
 - Composer
 - Codeception
 - Twitter Bootstrap 4
 - PSR