# ubuntu-18.04-php-8-sqlsrv

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

RUN apt-get install php8.0 php8.0-dev php8.0-xml -y --allow-unauthenticated
RUN pecl install sqlsrv
RUN pecl install pdo_sqlsrv
RUN printf "; priority=20\nextension=sqlsrv.so\n" > /etc/php/8.0/mods-available/sqlsrv.ini
RUN printf "; priority=30\nextension=pdo_sqlsrv.so\n" > /etc/php/8.0/mods-available/pdo_sqlsrv.ini
RUN phpenmod -v 8.0 sqlsrv pdo_sqlsrv

RUN echo 'export PATH="$PATH:/opt/mssql-tools/bin"' >> ~/.bashrc
```

## docker build

```
$ docker build -t ubuntu-18.04-php-8-sqlsrv .
```

