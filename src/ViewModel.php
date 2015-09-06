<?php
namespace LWS\Framework;

abstract class ViewModel
{
    private $parameters = [];

    public function __get($name)
    {
        if (isset($this->parameters[$name]) === true)
        {
            return $this->parameters[$name];
        }

        return null;
    }

    public function __isset($name)
    {
        return isset($this->parameters[$name]);
    }

    public function __set($name, $value)
    {
        $this->parameters[$name] = $value;
    }
}