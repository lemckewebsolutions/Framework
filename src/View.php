<?php

namespace LWS\JufThirza\Framework;

class View
{
    private $templateFile;

    /**
     * @param string $templateFile
     */
    public function __construct($templateFile)
    {
        $this->templateFile = $templateFile;
    }

    public function parse()
    {
        ob_start();

        try{
            include($this->templateFile);

            $output = ob_get_contents();
        }  catch (\Exception $exception) {
            // Clear the buffer before re-throwing the exception to prevent garbage from being
            // flushed to the output stream.
            ob_end_clean();
            throw $exception;
        }

        ob_end_clean();
        return $output;
    }
}