<?php

namespace App\Controller;

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
        $contrats = $this->contratRepository->findAll();
        $selectedDate = $request->query->get('selectedDate');
        $repository = $this->entityManager->getRepository(Service::class);



        if ($selectedDate) {
            $date = new \DateTime($selectedDate);
            $services = $repository->findBy(['date' => $date]);
        } else {
            $services = $repository->findBy(['date' => new \DateTime()]);
        }

        foreach ($services as $service) {
            $dateFin = clone $service->getDate();
            $duree = $service->getDuree();
            $dateFin->modify("+$duree days");
            $service->setDateFin($dateFin);
        }



        return $this->render('task/tach.html.twig', [
            'services' => $services,
            'contrats' => $contrats,
            'selectedDate' => $selectedDate,
        ]);
    }
}
