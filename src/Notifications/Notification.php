<?php

namespace LWS\Framework\Notifications;

class Notification
{
    const LEVEL_SUCCESS = 1;
    const LEVEL_NOTIFICATION = 2;
    const LEVEL_WARNING = 3;
    const LEVEL_ERROR = 4;

    /**
     * @var int
     */
    private $level;

    /**
     * @var string
     */
    private $message;

    public function __construct($message, $level)
    {
        $this->message = (string)$message;
        $this->level = (int)$level;
    }

    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }
}