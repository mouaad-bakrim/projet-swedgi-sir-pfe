<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Form\CategorieType;
use App\Repository\CategorieRepository;
use Dompdf\Dompdf;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\BinaryFileResponse;



class CategorieController extends AbstractController
{
    private $categorieRepository;
    private $entityManager;

    public function __construct(CategorieRepository $categorieRepository, ManagerRegistry $doctrine)
    {
        $this->categorieRepository = $categorieRepository;
        $this->entityManager = $doctrine->getManager();

    }

    #[Route('/categorie', name: 'categorie')]
    public function index(): Response
    {
        $categories = $this->categorieRepository->findAll();
        return $this->render('categorie/index.html.twig', [
            'categories' => $categories,
        ]);
    }

//new

    #[Route('/add/categorie', name: 'categorie_store')]
    public function store(Request $request): Response
    {
        $categorie = new Categorie();
        $form = $this->createForm(CategorieType::class, $categorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $categorie = $form->getData();

            $this->entityManager->persist($categorie);
            $this->entityManager->flush();

            $this->addFlash(
                'success',
                'Your categorie was saved'
            );

            return $this->redirectToRoute('categorie');
        }

        return $this->renderForm('categorie/create.html.twig', [
            'form' => $form,
        ]);
    }

    //show
    #[Route('/categorie/edit/{id}', name: 'categorie_edit')]
    public function edit(Categorie $categorie, Request $request): Response
    {

        $form = $this->createForm(CategorieType::class, $categorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $categorie = $form->getData();

            $this->entityManager->persist($categorie);
            $this->entityManager->flush();

            $this->addFlash(
                'success',
                'Your categorie was updated'
            );

            return $this->redirectToRoute('categorie');
        }

        return $this->renderForm('categorie/edit.html.twig', [
            'form' => $form,
        ]);

    }



    #[Route('/categorie/delete/{id}', name: 'categorie_delete')]
    public function delete(Categorie $categorie): Response
    {
        $this->entityManager->remove($categorie);
        $this->entityManager->flush();
        $this->addFlash(
            'success',
            'Your client was removed'
        );

        return $this->redirectToRoute('categorie');


    }


    //show list
#[Route('/categorie/show/{id}', name: 'categorie_show')]
    public function showw(Categorie $categorie, Request $request): Response
{

    $form = $this->createForm(CategorieType::class, $categorie);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $categorie = $form->getData();
    }
    return $this->renderForm('categorie/show.html.twig', [
        'categorie' => $categorie,
    ]);

}

    #[Route('/categorie/show/{id}/download', name: 'app_pdf_download')]
    public function downloadPdf(Categorie $categorie): Response
    {

        $dompdf = new Dompdf();

        $html = $this->renderView('categorie/show_pdf.html.twig', [
            'categorie' => $categorie,
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


}

