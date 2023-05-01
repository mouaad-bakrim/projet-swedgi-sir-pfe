<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaskeController extends AbstractController
{
    #[Route('/taske', name: 'taske')]
    public function index(): Response
    {
        return $this->render('taske/index.html.twig', [
            'controller_name' => 'TaskeController',
        ]);
    }
}
