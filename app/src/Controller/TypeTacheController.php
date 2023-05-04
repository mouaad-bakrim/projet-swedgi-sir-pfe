<?php

namespace App\Controller;

use App\Entity\TypeTache;
use App\Form\TypeTacheType;
use App\Repository\TypeTacheRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TypeTacheController extends AbstractController
{
    private $typeTacheRepository;
    private $entityManager;

    public function __construct(TypeTacheRepository $typeTacheRepository, ManagerRegistry $doctrine)
    {
        $this->typeTacheRepository = $typeTacheRepository;
        $this->entityManager = $doctrine->getManager();

    }

    #[Route('/typeTache', name: 'app_typeTache')]
    public function index(): Response
    {
        $typetTaches = $this->typeTacheRepository->findAll();
        return $this->render('tache_type/index.html.twig', [
            'typeTaches' => $typetTaches,
        ]);
    }

//new

    #[Route('/add/typeTache', name: 'typeTache_add')]
    public function store(Request $request): Response
    {
        $typeTache = new TypeTache();
        $form = $this->createForm(TypeTacheType::class, $typeTache);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typeTache = $form->getData();

            $this->entityManager->persist($typeTache);
            $this->entityManager->flush();

            $this->addFlash(
                'success',
                'Your categorie was saved'
            );

            return $this->redirectToRoute('app_typeTache');
        }

        return $this->renderForm('tache_type/create.html.twig', [
            'form' => $form,
        ]);
    }

    //show
    #[Route('/typeTache/edit/{id}', name: 'typeTache_edit')]
    public function edit(TypeTache $typeTache,Request $request): Response
    {

        $form = $this->createForm(TypeTacheType::class, $typeTache);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typeTache = $form->getData();

            $this->entityManager->persist($typeTache);
            $this->entityManager->flush();

            $this->addFlash(
                'success',
                'Your task was updated'
            );

            return $this->redirectToRoute('app_typeTache');
        }

        return $this->renderForm('tache_type/edit.html.twig', [
            'form' => $form,
        ]);

    }



    #[Route('/typeTache/delete/{id}', name: 'typeTache_delete')]
    public function delete(TypeTache $typeTache): Response
    {
        $this->entityManager->remove($typeTache);
        $this->entityManager->flush();
        $this->addFlash(
            'success',
            'Your client was removed'
        );

        return $this->redirectToRoute('app_typeTache');


    }


    //show list
    #[Route('/typeTache/show/{id}', name: 'typeTache_show')]
    public function showw(TypeTache $typeTache, Request $request): Response
    {

        $form = $this->createForm(TypeTacheType::class, $typeTache);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typeTache = $form->getData();
        }
        return $this->renderForm('tache_type/show.html.twig', [
            'typeTache' => $typeTache,
        ]);

    }


}
