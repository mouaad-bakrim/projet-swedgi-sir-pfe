<?php

// src/Controller/EmailController.php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class EmailController
{
    private MailerInterface $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }
    #[Route('/email', name: 'email')]
    public function sendEmail(): Response
    {
        $email = (new Email())
            ->from('bakrim2mo@gmail.com')
            ->to('mouaadbakrim@gmail.com')
            ->subject('A Cool Subject!')
            ->text('The plain text version of the message.')
            ->html('
                <h1 style="color: #fff300; background-color: #0073ff; width: 500px; padding: 16px 0; text-align: center; border-radius: 50px;">
                    The HTML version of the message.
                </h1>
                <img src="cid:Image_Name_1" style="width: 600px; border-radius: 50px">
                <br>
                <img src="cid:Image_Name_2" style="width: 600px; border-radius: 50px">
                <h1 style="color: #ff0000; background-color: #5bff9c; width: 500px; padding: 16px 0; text-align: center; border-radius: 50px;">
                    The End!
                </h1>
            ')
            ->attachFromPath('example_1.txt')
            ->attachFromPath('example_2.txt')
            ->embed(fopen('image_1.png', 'r'), 'Image_Name_1')
            ->embed(fopen('image_2.jpg', 'r'), 'Image_Name_2');

        try {
            $this->mailer->send($email);
            return new Response('<style> * { font-size: 100px; color: #444; background-color: #4eff73; } </style><pre><h1>&#127881;Email sent successfully!</h1></pre>');
        } catch (TransportExceptionInterface $e) {
            return new Response('<style>* { font-size: 100px; color: #fff; background-color: #ff4e4e; }</style><pre><h1>&#128544;Error!</h1></pre>');
        }
    }
}
