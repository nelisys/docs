<?php

namespace Acme;

class Kindle implements ReaderInterface
{
    public function turnOn()
    {
        echo 'turn on the Kindle' . PHP_EOL;
    }

    public function pressNext()
    {
        echo 'press next on the Kindle' . PHP_EOL;
    }
}
