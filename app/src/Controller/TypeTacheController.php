<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TypeTacheController extends AbstractController
{
    #[Route('/type/tache', name: 'app_type_tache')]
    public function index(): Response
    {
        return $this->render('type_tache/index.html.twig', [
            'controller_name' => 'TypeTacheController',
        ]);
    }
}
