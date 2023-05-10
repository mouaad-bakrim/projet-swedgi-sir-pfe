<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\Repository\ClientRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    private $clientRepository;
    private $categorieRepository;
    private  $registerRepository;
    private  $userRepository;


    public function __construct(ClientRepository $clientRepository,CategorieRepository $categorieRepository,UserRepository $registerRepository )
    {
        $this->clientRepository = $clientRepository;
        $this->categorieRepository = $categorieRepository;
        $this->userRepository = $registerRepository;

    }
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {

        $countCategories = $this->categorieRepository->count([]);
        $countClients = $this->clientRepository->count([]);
        $countRegisters = $this->userRepository->count([]);
        $clients = $this->clientRepository->findAll();
        $categories = $this->categorieRepository->findAll();
        $registers = $this->userRepository->findAll();
        return $this->render('home/index.html.twig', [
            'clients' => $clients,
            'categories' => $categories,
            'countClients' => $countClients,
            'countCategories' => $countCategories,
            'registers' => $countRegisters,
            'countUser' => $registers,
        ]);

    }
}
