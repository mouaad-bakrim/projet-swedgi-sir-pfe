<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\ClientType;
use App\Repository\ClientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;


class ClientController extends AbstractController
{
    private $clientRepository;
    private $entityManager;
    public function __construct(ClientRepository $clientRepository,  ManagerRegistry $doctrine)
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

//new

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

            $this->addFlash(
                'success',
                'Your client was saved'
            );

            return $this->redirectToRoute('client');
        }

        return $this->renderForm('client/create.html.twig', [
            'form' => $form,
        ] );
    }

    //show

    #[Route('/client/details/{id}', name: 'client_show')]
    public function show(Client $client): Response
    {
        return $this->render('client/show.html.twig', [
            'client' => $client,
        ]);

    }




    #[Route('/client/edit/{id}', name: 'client_edit')]
    public function edit(Client $client , Request $request): Response
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
        ] );

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
    public function view(Client $client, Request $request): Response
    {

        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $client = $form->getData();

            $this->entityManager->persist($client);
            $this->entityManager->flush();

            $this->addFlash(
                'success',
                'you can show informations of client'
            );

            return $this->redirectToRoute('client');
        }

        return $this->renderForm('client/show.html.twig', [
            'form' => $form,
        ]);

    }

}
