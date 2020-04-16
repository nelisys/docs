# composer

```console
$ composer -V
Composer version 1.9.1 2019-11-01 17:20:17
```

## require

```console
$ composer require nesbot/carbon

$ ls -1F
composer.json
composer.lock
vendor/

$ cat composer.json
{
    "require": {
        "nesbot/carbon": "^2.27"
    }
}
```

## require --dev

```console
$ composer require phpunit/phpunit --dev

$ ls -1F
composer.json
composer.lock
vendor/

$ cat composer.json
{
    "require": {
        "nesbot/carbon": "^2.27"
    },
    "require-dev": {
        "phpunit/phpunit": "^8.4"
    }
}
```

## install

In **dev** or **testing** environments, install both `require` and `require-dev` packages.

```console
$ ls -1F
composer.json

$ cat composer.json
{
    "require": {
        "nesbot/carbon": "^2.27"
    },
    "require-dev": {
        "phpunit/phpunit": "^8.4"
    }
}

$ composer install
Loading composer repositories with package information
Updating dependencies (including require-dev)
Package operations: 33 installs, 0 updates, 0 removals
...
```

Both `carbon` and `phpunit` will be installed.

## install --no-dev

In **staging** or **production** environments, install only `require` packages.

```console
$ ls -1F
composer.json

$ cat composer.json
{
    "require": {
        "nesbot/carbon": "^2.27"
    },
    "require-dev": {
        "phpunit/phpunit": "^8.4"
    }
}

$ composer install --no-dev
Loading composer repositories with package information
Updating dependencies
Package operations: 4 installs, 0 updates, 0 removals
...
```

Only `carbon` will be installed.

## Set Stability to install developing packages

```
    "minimum-stability": "dev",
    "prefer-stable": true,
```

## proxy

set proxy

```console
$ export http_proxy=http://192.168.1.1:3128/
$ export https_proxy=http://192.168.1.1:3128/
```
