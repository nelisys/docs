<?php

namespace Acme;

abstract class Sub
{
    public function make()
    {
        return $this->layBread()
            ->addLettuce()
            ->addToppings()
            ->addSauces();
    }

    protected function layBread()
    {
        echo ' - lay bread' . PHP_EOL;
        return $this;
    }

    protected function addLettuce()
    {
        echo ' - add lettuce' . PHP_EOL;
        return $this;
    }

    protected function addSauces()
    {
        echo ' - add sauces' . PHP_EOL;
        return $this;
    }

    abstract protected function addToppings();
}
