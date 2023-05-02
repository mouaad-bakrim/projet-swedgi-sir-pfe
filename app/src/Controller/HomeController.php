<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\Repository\ClientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    private $clientRepository;
    private $categorieRepository;


    public function __construct(ClientRepository $clientRepository,CategorieRepository $categorieRepository)
    {
        $this->clientRepository = $clientRepository;
        $this->categorieRepository = $categorieRepository;

    }
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {

        $countCategories = $this->categorieRepository->count([]);
        $countClients = $this->clientRepository->count([]);
        $clients = $this->clientRepository->findAll();
        $categories = $this->categorieRepository->findAll();
        return $this->render('home/index.html.twig', [
            'clients' => $clients,
            'categories' => $categories,
            'countClients' => $countClients,
            'countCategories' => $countCategories,
        ]);

    }
}
