<?php

namespace Acme;

class Book implements BookInterface
{
    public function open()
    {
        echo ' - open the Book' . PHP_EOL;
    }

    public function turnPage()
    {
        echo ' - turn the page' . PHP_EOL;
    }
}
