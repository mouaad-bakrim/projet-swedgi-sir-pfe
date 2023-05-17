<?php

namespace App\Controller;

use App\Entity\Service;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    private $entityManager;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->entityManager = $doctrine->getManager();
    }

    /**
     * @Route("/task", name="app_task")
     */
    public function index(Request $request): Response
    {
        $selectedDate = $request->query->get('selectedDate');
        $repository = $this->entityManager->getRepository(Service::class);

        if ($selectedDate) {
            $date = new \DateTime($selectedDate);
            $services = $repository->findBy(['date' => $date]);
        } else {
            $services = $repository->findBy(['date' => new \DateTime()]);
        }

        $dateFin = new \DateTime();
        $dateFin->add(new \DateInterval('P10D'));

        return $this->render('task/index.html.twig', [
            'services' => $services,
            'dateFin' => $dateFin,
        ]);
    }
}
