<?php

namespace LWS\Framework\Mail;

abstract class Handler
{
    public static function mail(Message $message)
    {
        $headers = 'From: ' . $message->getSender() . "\r\n";
        $headers .= 'Reply-To: contact@lemckewebsolutions.nl' . "\r\n";
        $headers .= 'X-Mailer: PHP/' . phpversion();

        mail(
            $message->getReceiver(),
            $message->getSubject(),
            $message->getBody(),
            $headers
        );
    }
}