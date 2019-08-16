# PHP MongoDB

## install MongoDB extension (Ubuntu 18.04)

```console
$ sudo pecl install mongodb
```

create ini file to load MongoDB extension

```console
$ sudo vi /etc/php/7.2/mods-available/mongodb.ini
extension=mongodb.so
```

create soft links for cli and fpm

```console
$ cd /etc/php/7.2/cli/conf.d/
$ sudo ln -s /etc/php/7.2/mods-available/mongodb.ini 20-mongodb.ini

$ cd /etc/php/7.2/fpm/conf.d/
$ sudo ln -s /etc/php/7.2/mods-available/mongodb.ini 20-mongodb.ini
```

restart fpm

```console
$ sudo systemctl restart php7.2-fpm
```

## example php

composer install mongodb

```console
$ composer require mongodb/mongodb
```

```php
<?php
// test-mongodb.php
require './vendor/autoload.php';

use MongoDB\Client;

$client = new Client("mongodb://127.0.0.1:27017");

$mongo = $client->testing;

// INSERT INTO students (username, email, name)
//               VALUES ('alice', 'alice@example.com', 'Alice A.');
$mongo->students->insertOne([
    'username' => 'alice',
    'email' => 'alie@example.com',
    'name' => 'Alice A.',
]);

// SELECT * FROM students;
$students = $mongo->students->find();

foreach ($students as $student) {
    echo $student->_id . ' ';
    echo $student->username . ' ';
    echo $student->email . ' ';
    echo $student->name  . ' ';
    echo "\n";
}
```

```console
$ php test-mongodb.php
5d56... alice alie@example.com Alice A.
```
