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
     * @return \mysqli|null
     */
    public static function getDatabaseConnection()
    {
        $config = static::getConfiguration();

        if (isset($config["database"]) === true) {
            return new \mysqli(
                $config["database"]["host"],
                $config["database"]["username"],
                $config["database"]["password"],
                $config["database"]["database"]
            );
        }

        return null;
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