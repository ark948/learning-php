<?php

namespace Store\Utils;

class Logger
{
    public function log($message)
    {
        var_dump('Log ' . $message);
    }
}