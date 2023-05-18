<?php

// src/Controller/SomeController.php
namespace App\Controller;

use App\Service\EmailService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SomeController extends AbstractController
{
    private $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    /**
     * @Route("/send-email", name="send_email")
     */
    public function sendEmail(): Response
    {
        $recipientEmail = 'mouaadbakrim@gmail.com';
        $subject = 'Sujet de l\'e-mail';
        $body = 'Contenu de l\'e-mail';

        $this->emailService->sendEmail($recipientEmail, $subject, $body);

        return new Response('E-mail envoyé !');
    }
}
