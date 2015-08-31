<?php

namespace LWS\Framework;

class Response
{
    /**
     * @var string
     */
    private $body = "";

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
}