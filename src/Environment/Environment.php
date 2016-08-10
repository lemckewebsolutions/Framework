<?php

namespace LWS\Framework\Environment;

class Environment
{
    /**
     * @return bool
     */
    public static function isInternal()
    {
        return in_array($_SERVER['REMOTE_ADDR'], ['192.168.33.1', '77.251.79.182']);
    }
}