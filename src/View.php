<?php

namespace LWS\Framework;

class View
{
    /**
     * @var string
     */
    private $templateFile;

    /**
     * @var array
     */
    private $variables = array();

    /**
     * @param string $templateFile
     */
    public function __construct($templateFile)
    {
        $this->templateFile = $templateFile;
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function assignVariable($name, $value)
    {
        $this->variables[(string)$name] = $value;
    }

    /**
     * @param $templatePath
     * @param array $variables
     * @return string
     * @throws \Exception
     */
    public function includeTemplate($templatePath, $variables = array())
    {
        ob_start();

        $variables = $this->variables + $variables;

        extract($variables);

        try{
            include((string)$templatePath);

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
     * @return string
     * @throws \Exception
     */
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