<?php

namespace Acme;

class Nook implements ReaderInterface
{
    public function turnOn()
    {
        echo ' - turn on the Nook' . PHP_EOL;
    }

    public function pressNext()
    {
        echo ' - press next on the Nook' . PHP_EOL;
    }
}
