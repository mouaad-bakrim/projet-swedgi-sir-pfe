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

    #[Route('/service/delete/{id}', name: 'service_delete')]
    public function delete(Service $service): Response
    {
        $this->entityManager->remove($service);
        $this->entityManager->flush();
        $this->addFlash(
            'success',
            'Your service was removed'
        );

        return $this->redirectToRoute('app_service');


    }

    #[Route('/add/service', name: 'service_add')]
    public function store(Request $request): Response
    {
        $form = $this->createForm(ServiceType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $serviceData = $form->getData();
            for ($i = 0; $i < 12; $i++) {
                $service = new Service();
                $service->setMission($serviceData->getMission());
                $service->setDesignation($serviceData->getDesignation());
                $service->setDuree($serviceData->getDuree());
                $service->setUser($serviceData->getUser());

                $date = new DateTime((new DateTime())->format("Y").'-'.(new DateTime())->format("m").'-'.$serviceData->getDate()->format('d'));
                $modifiedDate = clone $date;
                $modifiedDate->modify('+' . $i . ' month');
                $service->setDate($modifiedDate);

                $service->setDescription($serviceData->getDescription());

                $this->entityManager->persist($service);
                $this->entityManager->flush();
            }

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

    #[Route('/service/edit/{id}', name: 'service_edit')]
    public function edit(Service $service, Request $request): Response
    {

        $form = $this->createForm(ServiceType::class, $service);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $service = $form->getData();

            $this->entityManager->persist($service);
            $this->entityManager->flush();

            $this->addFlash(
                'success',
                'Your service was updated'
            );

            return $this->redirectToRoute('app_service');
        }

        return $this->renderForm('service/edite.html.twig', [
            'form' => $form,
        ]);

    }

    #[Route('/service/show/{id}', name: 'service_show')]
    public function showw(Service $service, Request $request): Response
    {

        $form = $this->createForm(ServiceType::class, $service);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $service = $form->getData();
        }
        return $this->renderForm('service/show.html.twig', [
            'service' => $service,
        ]);

    }








}
