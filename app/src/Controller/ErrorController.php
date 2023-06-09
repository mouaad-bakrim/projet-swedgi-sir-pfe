<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ErrorController extends AbstractController
{
    public function error404(): Response
    {
        return $this->render('error404.html.twig', [], Response::HTTP_NOT_FOUND);
    }
}
