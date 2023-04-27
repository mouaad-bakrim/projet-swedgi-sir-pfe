<?php

namespace App\Controller;

use App\Entity\Contrat;
use App\Form\ContratType;
use App\Repository\ContratRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContratController extends AbstractController
{
    private $contratRepository;
    private $entityManager;

    public function __construct(ContratRepository $contratRepository, ManagerRegistry $doctrine)
    {
        $this->contratRepository = $contratRepository;
        $this->entityManager = $doctrine->getManager();

    }

    #[Route('/contrat', name: 'contrat')]
    public function index(): Response
    {
        $contrats = $this->contratRepository->findAll();
        return $this->render('contrat/index.html.twig', [
            'contrats' => $contrats,
        ]);
    }

//new

    #[Route('/add/contrat', name: 'contrat_add')]
    public function add(Request $request): Response
    {
        $contrat = new Contrat();
        $form = $this->createForm(ContratType::class, $contrat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contrat = $form->getData();

            $this->entityManager->persist($contrat);
            $this->entityManager->flush();

            $this->addFlash(
                'success',
                'Your contrat was saved'
            );

            return $this->redirectToRoute('contrat');
        }

        return $this->renderForm('contrat/contrat.html.twig', [
            'form' => $form,
        ]);
    }

    //show
    #[Route('/contrat/edit/{id}', name: 'contrat_edit')]
    public function edit(Contrat $contrat, Request $request): Response
    {

        $form = $this->createForm(ContratType::class, $contrat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contrat = $form->getData();

            $this->entityManager->persist($contrat);
            $this->entityManager->flush();

            $this->addFlash(
                'success',
                'Your contrat was updated'
            );

            return $this->redirectToRoute('contrat');
        }

        return $this->renderForm('contrat/edit.html.twig', [
            'form' => $form,
        ]);

    }

    #[Route('/contrat/delete/{id}', name: 'contrat_delete')]
    public function delete(Contrat $contrat): Response
    {
        $this->entityManager->remove($contrat);
        $this->entityManager->flush();
        $this->addFlash(
            'success',
            'Your contrat was removed'
        );

        return $this->redirectToRoute('contrat');


    }


}

