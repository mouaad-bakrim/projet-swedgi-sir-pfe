<?php

// src/Service/EmailService.php
namespace App\Service;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class EmailService
{
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendEmail(string $recipientEmail, string $subject, string $body): void
    {
        $email = (new Email())
            ->from('bakrim2mo@gmail.com')
            ->to($recipientEmail)
            ->subject($subject)
            ->text($body);

        $this->mailer->send($email);
    }
}
