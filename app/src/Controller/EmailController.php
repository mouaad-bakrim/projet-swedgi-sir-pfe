<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;


class EmailController extends AbstractController
{
    /**
     * @Route("/send-email", name="send_email", methods={"POST"})
     */
    public function sendEmail(Request $request, MailerInterface $mailer): Response
    {
        $data = json_decode($request->getContent(), true);

        $email = (new Email())
            ->from('bakrim2mo@gmail.com')
            ->to($data['to'])
            ->subject($data['subject'])
            ->text($data['body']);

        $mailer->send($email);

        return new JsonResponse(['message' => 'Email envoyé']);
    }
}
