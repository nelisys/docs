<?php

namespace Acme;

use Exception;

class Light extends Checker
{
    public function check(HomeStatus $status)
    {
        if (! $status->lightOff) {
            throw new Exception('Light still on!');
        }

        $this->next($status);
    }
}
