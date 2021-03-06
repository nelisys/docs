# valet

## Requirements

```console
$ brew install dnsmasq
$ brew install mysql@5.7
$ brew install nginx
$ brew install php@7.3
```

## Installation

```console
$ composer global require laravel/valet
```

```console
$ cd Sites/

$ valet park
This directory has been added to Valet's paths.

$ valet paths
[
    "/Users/supasin/Sites"
]
```

## PHP

### Configuration Files

- /usr/local/etc/php/7.2/php.ini

### Restart Service

```console
$ sudo brew services restart php@7.2
```

## nginx

### Configuration files

- /usr/local/etc/nginx/valet/valet.conf

## Restart Service

```console
$ sudo brew services restart nginx
```
