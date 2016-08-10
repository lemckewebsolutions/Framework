<?php

namespace LWS\Framework;

class Environment
{
    /**
     * @return bool
     */
    public static function isInternal()
    {
        return in_array($_SERVER['REMOTE_ADDR'], ['77.251.79.182']);
    }
}