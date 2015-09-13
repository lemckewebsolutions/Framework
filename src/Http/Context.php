<?php

namespace LWS\Framework\Http;

use LWS\Framework\Notification;

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
     * @param Notification $notification
     */
    public static function addNotification(Notification $notification)
    {
        $_SESSION["notifications"][] = $notification;
    }

    /**
     * @return Notification[]
     */
    public static function getNotifications()
    {
        if (isset($_SESSION["notifications"]) === true &&
            is_array($_SESSION["notifications"]) === true) {
            return $_SESSION["notifications"];
        }

        return [];
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