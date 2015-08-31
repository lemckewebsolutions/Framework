<?php
namespace LWS\Framework;

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
            $jsonConfig = json_decode(file_get_contents($filePath));

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
             * @var IGet $controller
             */
            $controller = $reflectionClass->newInstance();

            switch ($_SERVER["REQUEST_METHOD"])
            {
                case "GET":
                    $controller->get();
            }

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