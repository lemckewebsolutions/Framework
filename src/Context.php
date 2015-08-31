<?php

namespace LWS\Framework;

abstract class Context
{
    private static $response;

    public static function getResponse()
    {
        if (self::$response === null) {
            self::$response = new Response();
        }

        return self::$response;
    }
}