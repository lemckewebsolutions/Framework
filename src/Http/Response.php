<?php

namespace LWS\Framework\Http;

class Response
{
    /**
     * @var string
     */
    private $body = "";

    /**
     * @var string
     */
    private $location;

    /**
     * @var string
     */
    private $status;

    public function __toString()
    {
        return $this->getBody();
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody($body)
    {
        $this->body = (string)$body;
    }

    /**
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param string $location
     */
    public function setLocation($location)
    {
        $this->location = (string)$location;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $value
     */
    public function setStatus($value)
    {
        $this->status = (string)$value;
    }
}