# SCL

## Install Repo

```
sudo yum install epel-release centos-release-scl
```

## Install PHP 7.2 FPM

```
sudo yum install rh-php72-php-fpm \
    rh-php72 \
    rh-php72-php-cli \
    rh-php72-php-gd \
    rh-php72-php-mbstring \
    rh-php72-php-mysqlnd \
    rh-php72-php-pdo \
    rh-php72-php-pear \
    rh-php72-php-process \
    rh-php72-php-soap \
    rh-php72-php-xml \
    sclo-php72-php-pecl-mongodb
```

```
# /etc/opt/rh/rh-php72/php-fpm.d/www.conf
user = nginx
group = nginx

listen = /var/run/php7.2-fpm.sock
listen.owner = nginx
listen.group = nginx
```

```
# /etc/nginx/nginx.conf

    server {
        location / {
            try_files $uri $uri/ /index.php?$query_string;
        }

        location ~ \.php$ {
            fastcgi_pass unix:/var/run/php7.2-fpm.sock;
            fastcgi_index  index.php;
            fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
            include        fastcgi_params;
        }
```

## MySQL 5.7

```
sudo yum install rh-mysql57-mysql-server

sudo systemctl restart rh-mysql57-mysqld.service

/opt/rh/rh-mysql57/root/bin/mysql_secure_installation
```
