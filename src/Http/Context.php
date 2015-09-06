<?php

namespace LWS\Framework\Http;

abstract class Context
{
    /**
     * @var array
     */
    private static $configuration = array();

    private static $response;

    /**
     * @param array $config
     */
    public static function addToConfig(array $config)
    {
        self::$configuration = array_merge(self::$configuration, $config);
    }

    /**
     * @return Response
     */
    public static function getResponse()
    {
        if (self::$response === null) {
            self::$response = new Response();
        }

        return self::$response;
    }

    /**
     * @return array
     */
    public static function getConfiguration()
    {
        return self::$configuration;
    }
}