<?php

namespace Acme;

class MailObserver implements Observer
{
    public function update()
    {
        echo 'Mail Login.' . PHP_EOL;
    }
}
