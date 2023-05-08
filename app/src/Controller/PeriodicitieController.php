<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PeriodicitieController extends AbstractController
{
    #[Route('/periodicitie', name: 'periodicitie')]
    public function index(): Response
    {
        return $this->render('periodicitie/index.html.twig', [
            'controller_name' => 'PeriodicitieController',
        ]);
    }
}
