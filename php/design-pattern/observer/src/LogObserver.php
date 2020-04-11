<?php

namespace Acme;

class LogObserver implements Observer
{
    public function update()
    {
        echo 'Log Login.' . PHP_EOL;
    }
}
