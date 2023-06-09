<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\ClientType;
use Dompdf\Dompdf;
use App\Repository\ClientRepository;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;


class ClientController extends AbstractController
{
    private $clientRepository;
    private $entityManager;

    public function __construct(ClientRepository $clientRepository, ManagerRegistry $doctrine)
    {
        $this->clientRepository = $clientRepository;
        $this->entityManager = $doctrine->getManager();
    }

    #[Route('/client', name: 'client')]
    public function index(): Response
    {
        $clients = $this->clientRepository->findAll();
        return $this->render('client/index.html.twig', [
            'clients' => $clients,
        ]);
    }

    #[Route('/add/client', name: 'client_add')]
    public function add(Request $request): Response
    {

        $client = new Client();
        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $client = $form->getData();

            $this->entityManager->persist($client);
            $this->entityManager->flush();


            $this->addFlash('success', 'Client ajouté avec succès');

            return $this->redirectToRoute('client');
        }

        return $this->renderForm('client/create.html.twig', [
            'form' => $form,
        ]);

    }

    #[Route('/client/edit/{id}', name: 'client_edit')]
    public function edit(Client $client, Request $request): Response
    {

        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $client = $form->getData();

            $this->entityManager->persist($client);
            $this->entityManager->flush();

            $this->addFlash(
                'success',
                'Your client was updated'
            );

            return $this->redirectToRoute('client');
        }

        return $this->renderForm('client/edit.html.twig', [
            'form' => $form,
        ]);

    }

    #[Route('/client/delete/{id}', name: 'client_delete')]
    public function delete(Client $client): Response
    {
        $this->entityManager->remove($client);
        $this->entityManager->flush();
        $this->addFlash(
            'success',
            'Your client was removed'
        );

        return $this->redirectToRoute('client');


    }



    #[Route('/client/view/{id}', name: 'client_view')]
    public function showw(Client $client, Request $request): Response
    {

        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $client = $form->getData();
        }

        return $this->renderForm('client/show.html.twig', [
            'client' => $client,
        ]);

    }

    #[Route('/client/show/{id}/download', name: 'app_pdf_download')]
    public function downloadPdf(Client $client): Response
    {

        $dompdf = new Dompdf();

        $html = $this->renderView('client/print.html.twig', [
            'client' => $client,
        ]);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $pdfContent = $dompdf->output();

        $response = new Response($pdfContent);
        $response->headers->set('Content-Type', 'application/pdf');
        $response->headers->set('Content-Disposition', 'attachment;filename="categorie.pdf"');

        return $response;
    }

    /**
     * @throws TransportExceptionInterface
     */
    #[Route('/send-email', name: 'send_email', methods: ['POST'])]
    public function sendEmail(MailerInterface $mailer)
    {
        // Create an instance of the TemplatedEmail class
        $email = (new TemplatedEmail())
            ->from('your_email@example.com') // Sender's email address
            ->to('recipient@example.com') // Recipient's email address
            ->subject('Subject of the message') // Subject of the message
            ->htmlTemplate('emails/example.html.twig') // HTML email template
            ->context(['variable_name' => 'variable_value']); // Optional context variables for the template

        // Send the email
        $mailer->send($email);

        // Perform additional actions after sending the email
    }

}
