<?php

namespace App\Controller;

use App\Entity\Service;
use App\Form\ServiceType;
use App\Repository\ServiceRepository;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ServiceController extends AbstractController
{
    private $serviceRepository;
    private $entityManager;

    public function __construct(ServiceRepository $serviceRepository, ManagerRegistry $doctrine)
    {
        $this->serviceRepository = $serviceRepository;
        $this->entityManager = $doctrine->getManager();

    }

    #[Route('/service', name: 'app_service')]
    public function index(): Response
    {
        $services = $this->serviceRepository->findAll();
        return $this->render('service/index.html.twig', [
            'services' => $services,
        ]);
    }

//new

    #[Route('/add/service', name: 'service_add')]
    public function store(Request $request): Response
    {
        $service = new Service();
        $form = $this->createForm(ServiceType::class, $service);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $service = $form->getData();



            $this->entityManager->persist($service);
            $this->entityManager->flush();

            $this->addFlash(
                'success',
                'Your service was saved'
            );

            return $this->redirectToRoute('app_service');
        }

        return $this->renderForm('service/create.html.twig', [
            'form' => $form,
        ]);
    }








}
