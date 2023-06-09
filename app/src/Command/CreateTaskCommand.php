<?php

namespace App\Command;

use App\Entity\Contrat;
use App\Entity\Service;
use App\Entity\Task;
use App\Repository\ContratRepository;
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

class CreateTaskCommand extends Command
{
    protected static $defaultName = 'app:get-current-service';

    private $entityManager;
    private $contratRepository;

    public function __construct(EntityManagerInterface $entityManager,ContratRepository $contratRepository)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
        $this->contratRepository = $contratRepository;
    }

    protected function configure()
    {
        $this
            ->setDescription('Récupère l\'entité Service associée à la date actuelle.')
            ->setHelp('Cette commande permet de récupérer l\'entité Service correspondante à la date actuelle.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        # $currentDate = new \DateTime();
        $repository = $this->entityManager->getRepository(Contrat::class);
        //$services = $repository->getTodayService();
        $contrats = $this->contratRepository->findAll();

        if (empty($contrats)) {
            $output->writeln('Aucun service trouvé pour la date actuelle.');
            return Command::FAILURE;
        }

        $output->writeln('Services trouvés à la date actuelle :');

        /**
         * @var Contrat $contrat
         */
        foreach ($contrats as $contrat) {
            $output->writeln('Service : ' . $contrat->getService());
            if($contrat->getTasks()->count() > 0) continue;
            $task = new Task();
            $task->setContrat($contrat);
            $task->setUser($contrat->getService()->getUser());
            $task->setDateDebut($contrat->getService()->getDate());
            $task->setDateFin((clone $contrat->getService()->getDate())->modify('+ '.$contrat->getService()->getDuree().' days'));
            $task->setService($contrat->getService());
            $this->entityManager->persist($task);
            $this->entityManager->flush();
        }
        // persist the entity to the database


        // output a message to the console indicating success
        $output->writeln('Task added successfully!');


        return Command::SUCCESS;
    }

}
