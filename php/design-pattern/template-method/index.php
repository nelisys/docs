<?php

require 'vendor/autoload.php';

use Acme\TurkishSub;
use Acme\VeggiesSub;

echo 'TurkishSub make():' . PHP_EOL;
$turkish = new TurkishSub;
$turkish->make();

echo 'VeggiesSub make():' . PHP_EOL;
$veggies = new VeggiesSub;
$veggies->make();

// TurkishSub make():
//  - lay bread
//  - add lettuce
//  - add turkish topppings
//  - add sauces
// VeggiesSub make():
//  - lay bread
//  - add lettuce
//  - add veggies toppings
//  - add sauces
