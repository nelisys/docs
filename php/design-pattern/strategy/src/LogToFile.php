<?php

namespace Acme;

class LogToFile implements LoggerInterface
{
    public function log($data)
    {
        echo "Log '{$data}' to File." . PHP_EOL;
    }
}
