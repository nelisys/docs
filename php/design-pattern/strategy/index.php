<?php

require 'vendor/autoload.php';

use Acme\LoggerInterface;
use Acme\LogToFile;
use Acme\LogToDatabase;

class User
{
    public function log($data, LoggerInterface $logger)
    {
        return $logger->log($data);
    }
}

$user = new User;
$user->log('Hello World!', new LogToFile);
$user->log('Hello World!', new LogToDatabase);

