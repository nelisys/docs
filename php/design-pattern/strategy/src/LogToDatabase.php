<?php

namespace Acme;

class LogToDatabase implements LoggerInterface
{
    public function log($data)
    {
        echo "Log '{$data}' to Database." . PHP_EOL;
    }
}
