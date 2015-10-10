<?php

namespace LWS\Framework;

use LWS\Framework\Http\Context;
use LWS\Framework\Http\IGet;
use LWS\Framework\Http\IPost;

abstract class RequestHandler
{
    /**
     * @param string $filePath
     */
    public function loadConfigurationFromJsonFile($filePath)
    {
        if (file_exists($filePath) === false) {
            return;
        }

        try {
            $jsonConfig = json_decode(file_get_contents($filePath), true);

            Context::addToConfig($jsonConfig);
        } catch (\Exception $e) {
            // don't do anything.
        }
    }

    public function process()
    {
        try
        {
            $reflectionClass = new \ReflectionClass($this->getController());

            /**
             * @var IGet|IPost $controller
             */
            $controller = $reflectionClass->newInstance();

            switch ($_SERVER["REQUEST_METHOD"])
            {
                case "GET":
                    $controller->get();
                    break;
                case "POST":
                    $controller->post();
                    break;
            }

            $response = Context::getResponse();

            if ($response->getLocation() !== null) {
                header("Location: " . $response->getLocation());
                header("HTTP/1.1 " . Context::getResponse()->getStatus());
                return;
            }

            header("HTTP/1.1 " . Context::getResponse()->getStatus());
            echo Context::getResponse();
        } catch (\Exception $exception)
        {
            var_dump($exception);
        }
    }

    /**
     * @return string
     */
    protected abstract function getController();
}