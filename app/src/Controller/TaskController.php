<?php

namespace App\Controller;

use App\Entity\Service;
use App\Entity\Contrat;
use App\Entity\Task;
use App\Repository\ContratRepository;
use DateInterval;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use LogicException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Workflow\WorkflowInterface;

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




        $contrats = $this->contratRepository->getTodayService();
        $selectedDate = $request->query->get('selectedDate');

        return $this->render('task/tach.html.twig', [
            'contrats' => $contrats,
            'selectedDate' => $selectedDate,

        ]);
    }

    /**
     * @Route("/task/{id}/workflow", name="task_workflow")
     */
    public function workflow(Request $request,$id, WorkflowInterface $taskRequestStateMachine): Response
    {
        $task = $this->entityManager->getRepository(Task::class)->find($id);

        $taskRequestStateMachine->can($task, 'to_progress'); // False
        $taskRequestStateMachine->can($task, 'to_completed'); // True

        if($taskRequestStateMachine->can($task, 'to_progress')){
            $taskRequestStateMachine->apply($task, 'to_progress');
        }elseif ($taskRequestStateMachine->can($task, 'to_completed')){
            $taskRequestStateMachine->apply($task, 'to_completed');
        }

        $this->entityManager->flush();
        return $this->redirectToRoute('app_task');
    }

}
