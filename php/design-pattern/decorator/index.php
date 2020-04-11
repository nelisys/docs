<?php

require 'vendor/autoload.php';

use Acme\BasicInspection;
use Acme\OilChange;
use Acme\TireRotation;

$basic = new BasicInspection();
echo 'Basic(20) = ' . $basic->getCost() . "\n";

$basic_and_oil = new OilChange($basic);
echo 'Basic(20) + Oil Change(15) = ' . $basic_and_oil->getCost() . "\n";

$basic_and_tire_rotation = new TireRotation($basic);
echo 'Basic(20) + Tire Rotation(10) = ' . $basic_and_tire_rotation->getCost() . "\n";

$all_services = new TireRotation((new OilChange($basic)));
echo 'All Services = ' . $all_services->getCost() . "\n";
