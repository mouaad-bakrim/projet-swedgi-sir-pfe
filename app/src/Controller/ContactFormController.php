<?php

namespace App\Controller;

use App\Form\ContactFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactFormController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function contact(Request $request, $mailer): \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
    {
        $form = $this->createForm(ContactFormType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            // Envoyer un email
            $message = (new \Swift_Message('Nouveau message depuis le formulaire de contact'))
                ->setFrom($data['email'])
                ->setTo('votre@email')
                ->setBody(
                    $this->renderView(
                        'emails/contact.html.twig',
                        ['message' => $data['message']]
                    ),
                    'text/html'
                );

            $mailer->send($message);

            // Rediriger vers une page de confirmation
            return $this->redirectToRoute('contact_confirmation');
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
