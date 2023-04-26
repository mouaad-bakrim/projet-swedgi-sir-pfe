<?php

namespace App\Controller;

use App\Entity\Periodicite;
use App\Form\PeriodiciteType;
use App\Repository\PeriodiciteRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PeriodiciteController extends AbstractController
{

    private $periodiciteRepository;
    private $entityManager;

    public function __construct(PeriodiciteRepository $periodiciteRepository, ManagerRegistry $doctrine)
    {
        $this->clientRepository = $periodiciteRepository;
        $this->entityManager = $doctrine->getManager();
    }

    #[Route('/periodicite', name: 'app_periodicite')]
    public function index(): Response
    {
        $periodicites = $this->clientRepository->findAll();
        return $this->render('periodicite/index.html.twig', [
            'periodicites' => $periodicites,
        ]);
    }

    #[Route('/add/periodicite', name: 'periodicite_add')]
    public function add(Request $request): Response
    {
        $periodicite = new Periodicite();
        $form = $this->createForm(PeriodiciteType::class, $periodicite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $periodicite = $form->getData();

            $this->entityManager->persist($periodicite);
            $this->entityManager->flush();

            $this->addFlash(
                'success',
                'Your periodicity was saved'
            );

            return $this->redirectToRoute('periodicite');
        }

        return $this->renderForm('periodicite/create.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/periodicite/delete/{id}', name: 'periodicite_delete')]
    public function delete(Periodicite $periodicite): Response
    {
        $this->entityManager->remove($periodicite);
        $this->entityManager->flush();
        $this->addFlash(
            'success',
            'Your periodicity was removed'
        );

        return $this->redirectToRoute('periodicite');


    }


}
