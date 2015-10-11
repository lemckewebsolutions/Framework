<?php

namespace LWS\Framework\Http;

use LWS\Framework\Notifications\Container;
use LWS\Framework\Notifications\Notification;

abstract class Context
{
    /**
     * @var array
     */
    private static $configuration = array();

    /**
     * @var Container
     */
    private static $notificationContainer;

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
        return static::getNotificationsContainer();
    }

    /**
     * @return Container
     */
    private static function getNotificationsContainer()
    {
        if (static::$notificationContainer === null) {
            $notifications = [];

            if (isset($_SESSION["notifications"]) === true &&
                is_array($_SESSION["notifications"]) === true) {
                $notifications = $_SESSION["notifications"];
            }
            static::$notificationContainer = new Container($notifications);
        }

        return static::$notificationContainer;
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