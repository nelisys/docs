<?php

namespace Acme;

use Exception;

class Alarm extends Checker
{
    public function check(HomeStatus $status)
    {
        if (! $status->alarmOn) {
            throw new Exception('Alarm not turn on!');
        }

        $this->next($status);
    }
}
