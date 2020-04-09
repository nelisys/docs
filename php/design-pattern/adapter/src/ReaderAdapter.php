<?php

namespace Acme;

class ReaderAdapter implements BookInterface
{
    protected $reader;

    public function __construct(ReaderInterface $reader)
    {
        $this->reader = $reader;
    }

    public function open()
    {
        return $this->reader->turnOn();
    }

    public function turnPage()
    {
        return $this->reader->pressNext();
    }
}
