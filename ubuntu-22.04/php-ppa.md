# php ppa

## Repository

```
sudo add-apt-repository ppa:ondrej/php

sudo apt update
```

## Install

```
sudo apt install -y php8.2-fpm
```

### Install PHP Modules to run Laravel

```
sudo apt install -y php8.2-zip \
    php8.2-mbstring \
    php8.2-xml \
    php8.2-sqlite3 \
    php8.2-mysql \
    php8.2-gd \
    php8.2-curl
```

```
sudo systemctl restart php8.2-fpm
```
