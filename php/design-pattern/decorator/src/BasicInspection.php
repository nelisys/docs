<?php

namespace Acme;

class BasicInspection implements CarService
{
    public function getCost()
    {
        return 20;
    }
}
