<?php

namespace App\Controller;

use App\Entity\Task;
use App\Repository\ContratRepository;
use App\Repository\TaskRepository;
use App\Repository\UserRepository;
use App\Workflow\TaskWorkflow;
use DateInterval;

use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Workflow\Registry;

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
        $dateFin = new DateTime();
        $dateFin->add(new DateInterval('P10D'));
        $date = new DateTime();
        $contrats = $this->contratRepository->findAll();
        $users = $this->userRepository->findAll();
        $tasks = $this->taskRepository->findAll();

        $dateDiff = new DateTime('2023-05-10');
        $dateDiff->add(new DateInterval('P10D'));
        $now = new DateTime();
        $diff = $now->diff($dateDiff);

        $dateDebut = new DateTime();


        return $this->render('task/index.html.twig', [
            'diff' => $diff,
            'date' => $date,
            'dateDebut' => $dateDebut,
            'dateFin' => $dateFin,
            'contrats' => $contrats,
            'users' => $users,
            'tasks' => $tasks,
        ]);
    }

    /*  public function complete(Task $task): Response
      {
          $workflow = TaskWorkflow::get();
          $workflow->apply($task, 'complete');

          $this->entityManager->flush();

          return $this->redirectToRoute('app_task');
      }*/
  #  /**
   #  * @Route("/task/{id}/complete", name="task_complete", methods={"POST"})
    # */
 /*   public function complete(Task $task, Registry $registry): Response
    {
        $workflow = $registry->get($task);
        $workflow->apply($task, 'to_completed');

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->flush();

        return $this->redirectToRoute('task_list');
    }*/



}