<?php

namespace Acme;

class TurkishSub extends Sub
{
    protected function addToppings()
    {
        echo ' - add turkish topppings' . PHP_EOL;
        return $this;
    }
}
