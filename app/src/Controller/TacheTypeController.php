<?php

namespace App\Controller;

use App\Entity\TacheType;
use App\Repository\TacheTypeRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TacheTypeController extends AbstractController
{
    private $tachetypeRepository;
    private $entityManager;

    public function __construct(TachetypeRepository $tachetypeRepository, ManagerRegistry $doctrine)
    {
        $this->tachetypeRepository = $tachetypeRepository;
        $this->entityManager = $doctrine->getManager();
    }
    #[Route('/tachetype', name: 'tachetype')]
    public function index(): Response
    {
        $tachetypes = $this->tachetypeRepository->findAll();
        return $this->render('tachetype/index.html.twig', [
            'tachetypes' => $tachetypes,
        ]);
    }

    #[Route('/add/tachetype', name: 'tachetype_add')]
    public function add(Request $request): Response
    {
        $tachetype = new TacheType();
        $form = $this->createForm(TacheType::class, $tachetype);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tachetype = $form->getData();

            $this->entityManager->persist($tachetype);
            $this->entityManager->flush();

            $this->addFlash(
                'success',
                'Your tachetype was saved'
            );

            return $this->redirectToRoute('tachetype');
        }

        return $this->renderForm('tachetype/tachetype.html.twig', [
            'form' => $form,
        ]);
    }


    #[Route('/tachetype/edit/{id}', name: 'tachetype_edit')]
    public function edit(Tachetype $tachetype, Request $request): Response
    {

        $form = $this->createForm(TacheType::class, $tachetype);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tachetype = $form->getData();

            $this->entityManager->persist($tachetype);
            $this->entityManager->flush();

            $this->addFlash(
                'success',
                'Your tachetype was updated'
            );

            return $this->redirectToRoute('tachetype');
        }

        return $this->renderForm('tachetype/edit.html.twig', [
            'form' => $form,
        ]);

    }

    #[Route('/tachetype/delete/{id}', name: 'tachetype_delete')]
    public function delete(Tachetype $tachetype): Response
    {
        $this->entityManager->remove($tachetype);
        $this->entityManager->flush();
        $this->addFlash(
            'success',
            'Your tachetype was removed'
        );

        return $this->redirectToRoute('tachetype');


    }
}
