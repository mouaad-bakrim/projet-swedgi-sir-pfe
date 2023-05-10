<?php

namespace App\Controller;

use App\Repository\ContratRepository;
use App\Repository\TaskRepository;
use App\Repository\UserRepository;
use DateInterval;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController

{
    private $entityManager;
    private  $contratRepository;
    private $userRepository;
    private $taskRepository;

    public function __construct(ContratRepository $contratRepository,UserRepository $userRepository,TaskRepository $taskRepository, ManagerRegistry $doctrine)
    {
        $this->contratRepository = $contratRepository;
        $this->taskRepository = $taskRepository;
        $this->userRepository = $userRepository;
        $this->entityManager = $doctrine->getManager();

    }

    #[Route('/task', name: 'app_task')]
    public function index(): Response
    {
        $dateDebut = new DateTime();
        $dateFin = clone $dateDebut;
        $dateFin->add(new DateInterval('P12D'));

        $diff = $dateDebut->diff($dateFin)->format('%a');
        $contrats = $this->contratRepository->findAll();
        $users = $this->userRepository->findAll();
        $tasks = $this->taskRepository->findAll();

        foreach ($tasks as $task) {
            $task->setDateFin(clone $task->getDateDebut());
            $task->getDateFin()->add(new DateInterval('P11D'));
        }

        return $this->render('task/index.html.twig', [
            'diff' => $diff,
            'dateDebut' => $dateDebut,
            'dateFin' => $dateFin,
            'contrats' => $contrats,
            'users' => $users,
            'tasks' => $tasks,
        ]);
    }



}
