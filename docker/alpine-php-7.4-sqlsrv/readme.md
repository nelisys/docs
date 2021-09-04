# alpine-php-7.4-sqlsrv

## Dockerfile

```Dockerfile
FROM alpine:3.14
RUN apk update && apk upgrade
RUN apk add curl

#-------------------------------------------------------------------------------
# Install the Microsoft ODBC driver for SQL Server (Linux)
# Ref. https://docs.microsoft.com/en-us/sql/connect/odbc/linux-mac/installing-the-microsoft-odbc-driver-for-sql-server?view=sql-server-ver15#alpine17
#-------------------------------------------------------------------------------

# Download the desired package(s)
RUN curl --silent -O https://download.microsoft.com/download/e/4/e/e4e67866-dffd-428c-aac7-8d28ddafb39b/msodbcsql17_17.8.1.1-1_amd64.apk
RUN curl --silent -O https://download.microsoft.com/download/e/4/e/e4e67866-dffd-428c-aac7-8d28ddafb39b/mssql-tools_17.8.1.1-1_amd64.apk

# Install the package(s)
RUN apk add --allow-untrusted msodbcsql17_17.8.1.1-1_amd64.apk
RUN apk add --allow-untrusted mssql-tools_17.8.1.1-1_amd64.apk

RUN ln -s /opt/mssql-tools/bin/bcp /usr/local/bin/bcp
RUN ln -s /opt/mssql-tools/bin/sqlcmd /usr/local/bin/sqlcmd

#-------------------------------------------------------------------------------
# Microsoft Drivers for PHP for SQL Server
# Ref. https://docs.microsoft.com/en-us/sql/connect/php/installation-tutorial-linux-mac?view=sql-server-ver15#installing-on-alpine
#-------------------------------------------------------------------------------

RUN apk add autoconf make g++ unixodbc-dev
RUN apk add php7 php7-fpm php7-dev php7-pear php7-openssl php7-opcache php7-pdo

RUN pecl install sqlsrv
RUN pecl install pdo_sqlsrv

RUN echo extension=pdo_sqlsrv.so >> `php --ini | grep "Scan for additional .ini files" | sed -e "s|.*:\s*||"`/10_pdo_sqlsrv.ini
RUN echo extension=sqlsrv.so >> `php --ini | grep "Scan for additional .ini files" | sed -e "s|.*:\s*||"`/00_sqlsrv.ini

#-------------------------------------------------------------------------------
# Install more PHP Modules
#-------------------------------------------------------------------------------
RUN apk add php7-curl php7-gd php7-gettext php7-mbstring php7-xml php7-zip
RUN apk add php7-pdo_mysql php7-pdo_sqlite
RUN apk add php7-json php7-phar
RUN apk add php7-dom php7-fileinfo php7-tokenizer php7-xmlwriter

#-------------------------------------------------------------------------------
# composer
#-------------------------------------------------------------------------------
WORKDIR /var/www/html

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

#-------------------------------------------------------------------------------
# nodejs
#-------------------------------------------------------------------------------
RUN apk add nodejs npm
```

## docker build

```
$ docker build -t alpine-php-7.4-sqlsrv .
```

