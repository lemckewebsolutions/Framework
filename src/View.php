<?php

namespace LWS\Framework;

class View
{
    private $templateFile;

    private $variables = array();

    /**
     * @param string $templateFile
     */
    public function __construct($templateFile)
    {
        $this->templateFile = $templateFile;
    }

    public function assignVariable($name, $value)
    {
        $this->variables[$name] = $value;
    }

    public function parse()
    {
        ob_start();

        extract($this->variables);

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

    /**
     * @return array
     */
    public function getVariables()
    {
        return $this->variables;
    }
}