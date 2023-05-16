<?php

namespace App\Controller;

use App\Command\CreateTaskCommand;
use Doctrine\ORM\EntityManagerInterface;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class YourController extends AbstractController
{
    private $entityManager;

    public function __construct(ManagerRegistry $registry)
    {
        $this->entityManager = $registry->getManager();
    }

    // ...

    private function getDoctrine(): ManagerRegistry
    {
        return $this->getDoctrine();
    }

    /**
     * @Route("/your-route", name="your_route")
     */
    public function yourAction(): Response
    {
        // Créez une instance de la commande
        $command = new CreateTaskCommand($this->entityManager);

        // Créez une application console Symfony
        $application = new Application($this->get('kernel'));

        // Ajoutez la commande à l'application
        $application->add($command);

        // Créez les entrées et sorties de la commande
        $input = new ArrayInput([
            'command' => $command->getName(),
        ]);
        $output = new BufferedOutput();

        // Exécutez la commande
        $application->run($input, $output);

        // Récupérez la sortie de la commande
        $outputContent = $output->fetch();

        // Utilisez la sortie de la commande dans votre template Twig
        return $this->render('your_template.html.twig', [
            'output' => $outputContent,
        ]);
    }


}
