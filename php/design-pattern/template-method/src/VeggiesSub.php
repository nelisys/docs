<?php

namespace Acme;

class VeggiesSub extends Sub
{
    protected function addToppings()
    {
        echo ' - add veggies toppings' . PHP_EOL;
        return $this;
    }
}
