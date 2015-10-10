<?php

namespace LWS\Framework\Http;

abstract class Controller
{
    /**
     * @return bool
     */
    protected function isAjaxRequest()
    {
        $isAjaxRequest = false;

        if (array_key_exists("HTTP_X_REQUESTED_WITH", $_SERVER) === true &&
              strtolower($_SERVER["HTTP_X_REQUESTED_WITH"]) === "xmlhttprequest")
        {
            $isAjaxRequest = true;
        }

        return $isAjaxRequest;
    }
}