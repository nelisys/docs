<?php

namespace Acme;

abstract class Checker
{
    protected $successor;

    abstract public function check(HomeStatus $status);

    public function setNext(Checker $successor)
    {
        $this->successor = $successor;
    }

    public function next(HomeStatus $status)
    {
        if ($this->successor) {
            $this->successor->check($status);
        }
    }
}
