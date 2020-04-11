<?php

namespace Acme;

use Exception;

class Lock extends Checker
{
    public function check(HomeStatus $status)
    {
        if (! $status->isLocked) {
            throw new Exception('Home is not locked!');
        }

        $this->next($status);
    }
}
