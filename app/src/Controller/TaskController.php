<?php

namespace App\Controller;

use App\Entity\Service;
use App\Entity\Contrat;
use App\Entity\Task;
use App\Repository\ContratRepository;
use App\Repository\TaskRepository;
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
    private $taskRepository;

    public function __construct(TaskRepository $taskRepository,ContratRepository $contratRepository, ManagerRegistry $doctrine)
    {
        $this->entityManager = $doctrine->getManager();
        $this->contratRepository = $contratRepository;
        $this->taskRepository = $taskRepository;

    }

    /**
     * @Route("/task", name="app_task")
     */
    public function index(Request $request): Response
    {


        $tasks = $this->taskRepository->findAll();
        # $selectedDate = $request->query->get('selectedDate');

        return $this->render('task/task.html.twig', [
            //'contrats' => $contrats,
            #      'selectedDate' => $selectedDate,
            'tasks'=> $tasks ,


        ]);
    }

    /**
     * @Route("/task/{id}/workflow", name="task_workflow")
     */
    public function workflow($id, WorkflowInterface $taskRequestStateMachine): Response
    {
        $task = $this->entityManager->getRepository(Task::class)->find($id);

        if($taskRequestStateMachine->can($task, 'to_progress')){
            $taskRequestStateMachine->apply($task, 'to_progress');
        }elseif ($taskRequestStateMachine->can($task, 'to_completed')){
            $taskRequestStateMachine->apply($task, 'to_completed');
        }

        $this->entityManager->flush();
        return $this->redirectToRoute('app_task');
    }
    #[Route('/task/delete/{id}', name: 'task_delete')]
    public function delete(Task $task): Response
    {
        $this->entityManager->remove($task);
        $this->entityManager->flush();
        $this->addFlash(
            'success',
            'Your task was removed'
        );

        return $this->redirectToRoute('app_task');


    }

}
