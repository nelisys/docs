# ubuntu-18.04-php-fpm7.4-sqlsrv

## Dockerfile

```Dockerfile
FROM ubuntu:18.04

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update
RUN apt-get upgrade
RUN apt-get install -y apt-utils
RUN apt-get install -y software-properties-common
RUN apt-get install -y curl gnupg apt-transport-https

RUN add-apt-repository ppa:ondrej/php -y
RUN curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add -
RUN curl https://packages.microsoft.com/config/ubuntu/18.04/prod.list > /etc/apt/sources.list.d/mssql-release.list

RUN apt-get update
RUN ACCEPT_EULA=Y apt-get install -y msodbcsql17
RUN ACCEPT_EULA=Y apt-get install -y mssql-tools
RUN apt-get install -y unixodbc-dev

RUN apt-get install php7.4-fpm \
    php7.4-dev \
    php7.4-xml \
    php7.4-zip \
    php7.4-mbstring \
    php7.4-pdo-sqlite \
    php7.4-pdo-mysql \
    php7.4-gd \
    php7.4-curl \
    -y --allow-unauthenticated

RUN pecl install sqlsrv
RUN pecl install pdo_sqlsrv
RUN printf "; priority=20\nextension=sqlsrv.so\n" > /etc/php/7.4/mods-available/sqlsrv.ini
RUN printf "; priority=30\nextension=pdo_sqlsrv.so\n" > /etc/php/7.4/mods-available/pdo_sqlsrv.ini
RUN phpenmod -v 7.4 sqlsrv pdo_sqlsrv

RUN echo 'export PATH="$PATH:/opt/mssql-tools/bin"' >> ~/.bashrc

# Clean up
RUN apt-get remove php7.4-dev -y
RUN apt-get remove -y software-properties-common
RUN apt-get autoremove -y

#
RUN mkdir -p /var/www/html

COPY ./files/zz-docker.conf /etc/php/7.4/fpm/pool.d/zz-docker.conf

WORKDIR /var/www/html

STOPSIGNAL SIGQUIT

EXPOSE 9000
CMD ["php-fpm7.4"]
```

## files/zz-docker.conf

```
[global]
pid = /var/run/php7.4-fpm.pid
daemonize = no

[www]
listen = 9000
```

## docker build

```
$ docker build -t ubuntu-18.04-php-fpm7.4-sqlsrv .
```

## docker run

```
$ docker run -p 9000:9000 \
    -v /var/www/html:/var/www/html \
    ubuntu-18.04-php-fpm7.4-sqlsrv
```

## nginx config

```
# /etc/nginx/sites-enabled/default
server {
    // ...

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;

        #fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
        fastcgi_pass 127.0.0.1:9000;
    }
```
