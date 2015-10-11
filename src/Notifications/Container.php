<?php

namespace LWS\Framework\Notifications;

class Container implements \Iterator
{
    /**
     * @var Notification[]
     */
    private $notifications;

    /**
     * @param array $notifications
     */
    public function __construct(array $notifications)
    {
        $this->notifications = $notifications;
    }

    /**
     * @return Notification
     */
    public function current()
    {
        return current($this->notifications);
    }

    /**
     * @return Notification
     */
    public function next()
    {
        return next($this->notifications);
    }

    /**
     * @return mixed
     */
    public function key()
    {
        return key($this->notifications);
    }

    public function valid()
    {
        $key = key($this->notifications);

        return ($key !== null && $key !== false);
    }

    public function rewind()
    {
        reset($this->notifications);
    }
}