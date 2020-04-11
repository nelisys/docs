<?php

require 'vendor/autoload.php';

use Acme\LoginSubject;
use Acme\LogObserver;
use Acme\MailObserver;

$login = new LoginSubject;
$login->attach(new LogObserver);
$login->attach(new MailObserver);
$login->notify();
