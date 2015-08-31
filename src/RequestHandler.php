<?php
namespace LWS\Framework;

abstract class RequestHandler
{
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