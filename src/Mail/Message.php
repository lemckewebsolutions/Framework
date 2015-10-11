<?php

namespace LWS\Framework\Mail;

class Message
{
    /**
     * @var string
     */
    private $body;

    /**
     * @var string
     */
    private $receiver;

    /**
     * @var string
     */
    private $sender;

    /**
     * @var string
     */
    private $subject;

    public function __construct ($receiver, $sender, $subject, $body)
    {
        $this->receiver = (string)$receiver;
        $this->sender = (string)$sender;
        $this->subject = (string)$subject;
        $this->body = (string)$body;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return string
     */
    public function getReceiver()
    {
        return $this->receiver;
    }

    /**
     * @return string
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }
}