<?php

namespace App\Command;

use App\Entity\Contrat;
use App\Entity\Service;
use App\Entity\Task;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Workflow\WorkflowInterface;

class CreateTaskCommand extends Command
{
    protected static $defaultName = 'app:get-current-service';

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
    }

    protected function configure()
    {
        $this
            ->setDescription('Récupère l\'entité Service associée à la date actuelle.')
            ->setHelp('Cette commande permet de récupérer l\'entité Service correspondante à la date actuelle.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $currentDate = new \DateTime();
        $repository = $this->entityManager->getRepository(Contrat::class);
        $services = $repository->findBy(['date' => $currentDate]);

        if (empty($services)) {
            $output->writeln('Aucun service trouvé pour la date actuelle.');
            return Command::FAILURE;
        }

        $output->writeln('Services trouvés à la date actuelle :');

        foreach ($services as $contrat) {
            $output->writeln('Service : ' . $contrat->getService());
            // Faites ce que vous souhaitez avec l'entité Service récupérée ici
        }

        return Command::SUCCESS;
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
    public function workflow(Request $request, $id, WorkflowInterface $taskRequestStateMachine): Response
    {
        $task = $this->entityManager->getRepository(Task::class)->find($id);

        $taskRequestStateMachine->can($task, 'to_progress'); // False
        $taskRequestStateMachine->can($task, 'to_completed'); // True

        if ($taskRequestStateMachine->can($task, 'to_progress')) {
            $taskRequestStateMachine->apply($task, 'to_progress');
        } elseif ($taskRequestStateMachine->can($task, 'to_completed')) {
            $taskRequestStateMachine->apply($task, 'to_completed');
        }

        $this->entityManager->flush();
        return $this->redirectToRoute('app_task');
    }
}
