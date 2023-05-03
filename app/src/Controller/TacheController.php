<?php

namespace App\Controller;

use App\Entity\Tache;
use App\Form\TacheType;
use App\Repository\TacheRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TacheController extends AbstractController
{
    private $tacheRepository;
    private $entityManager;

    public function __construct(tacheRepository $tacheRepository, ManagerRegistry $doctrine)
    {
        $this->tacheRepository = $tacheRepository;
        $this->entityManager = $doctrine->getManager();
    }

    #[Route('/tache', name: 'app_tache')]
    public function index(): Response
    {
        $taches = $this->tacheRepository->findAll();
        return $this->render('tache/index.html.twig', [
            'taches' => $taches,
        ]);
    }

    #[Route('/add/tache', name: 'tache_add')]
    public function add(Request $request): Response
    {
        $tache = new Tache();
        $form = $this->createForm(TacheType::class, $tache);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tache = $form->getData();

            $this->entityManager->persist($tache);
            $this->entityManager->flush();

            $this->addFlash(
                'success',
                'Your mission was saved'
            );

            return $this->redirectToRoute('tache');
        }

        return $this->renderForm('tache/create.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/tache/delete/{id}', name: 'tache_delete')]
    public function delete(Tache $tache): Response
    {
        $this->entityManager->remove($tache);
        $this->entityManager->flush();
        $this->addFlash(
            'success',
            'Your mission was removed'
        );

        return $this->redirectToRoute('tache');


    }


}
