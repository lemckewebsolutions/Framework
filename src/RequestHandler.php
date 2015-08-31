<?php
namespace LWS\Framework;

abstract class RequestHandler
{
    public function process()
    {
        try
        {
            /**
             * @var IGet $controller
             */
            $controller = new \ReflectionClass($this->getController());

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
}