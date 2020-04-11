<?php

require 'vendor/autoload.php';

use Acme\Lock;
use Acme\Light;
use Acme\Alarm;
use Acme\HomeStatus;

try {
    $status = new HomeStatus;

    $lock = new Lock;
    $light = new Light;
    $alarm = new Alarm;

    $lock->setNext($light);
    $light->setNext($alarm);

    $lock->check($status);
} catch (Exception $error) {
    echo $error->getMessage() . PHP_EOL;
}

