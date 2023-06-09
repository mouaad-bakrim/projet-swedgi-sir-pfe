<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\CategorieRepository;
use App\Repository\ClientRepository;
use App\Repository\ContratRepository;
use App\Repository\ServiceRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class HomeController extends AbstractController
{

    private $clientRepository;
    private $categorieRepository;
    private  $registerRepository;
    private  $userRepository;
    private $serviceRepository;
    private $contratRepository;


    public function __construct(UserRepository $userRepository, ClientRepository $clientRepository, ContratRepository $contratRepository, ServiceRepository $serviceRepository,CategorieRepository $categorieRepository,UserRepository $registerRepository )
    {
        $this->userRepository = $userRepository;
        $this->clientRepository = $clientRepository;
        $this->contratRepository = $contratRepository;
        $this->serviceRepository = $serviceRepository;
        $this->categorieRepository = $categorieRepository;
        $this->userRepository = $registerRepository;

    }
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
        $users = $this->userRepository->findLatestUsers();

        $countCategories = $this->categorieRepository->count([]);
        $countClients = $this->clientRepository->count([]);
        $countContrats = $this->contratRepository->count([]);
        $countServices = $this->serviceRepository->count([]);
        $countRegisters = $this->userRepository->count([]);
        $clients = $this->clientRepository->findAll();
        $categories = $this->categorieRepository->findAll();
        $registers = $this->userRepository->findAll();
        return $this->render('home/home.html.twig', [
            'clients' => $clients,
            'categories' => $categories,
            'countClients' => $countClients,
            'countRegisters' => $countRegisters,
            'countCategories' => $countCategories,
            'countContrats' => $countContrats,
            'countServices' => $countServices,
            'users' => $users,
            'countUser' => $registers,
        ]);

    }
}
