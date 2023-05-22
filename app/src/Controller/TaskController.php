<?php

namespace App\Controller;

use App\Entity\Contrat;
use App\Entity\Service;
use App\Repository\ContratRepository;
use DateInterval;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    private $entityManager;
    private  $contratRepository;

    public function __construct(ContratRepository $contratRepository, ManagerRegistry $doctrine)
    {
        $this->entityManager = $doctrine->getManager();
        $this->contratRepository = $contratRepository;

    }
    /**
     * @Route("/task", name="app_task")
     */
    public function index(Request $request): Response
    {
        $currentDate = new \DateTime();
        $repository = $this->entityManager->getRepository(Service::class);
        $contrats = $repository->findBy(['date' => $currentDate]);

        return $this->render('task/tach.html.twig', [

            'contrats' => $contrats,

        ]);
    }
}
