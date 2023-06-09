<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use App\Security\AppCustomAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Role\Role;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class RegistrationController extends AbstractController
{
    private $registerRepository;
    private  $entityManager;

    public function __construct(UserRepository $registerRepository, ManagerRegistry $doctrine)
    {
        $this->registerRepository = $registerRepository;
        $this->entityManager = $doctrine->getManager();

    }

    #[Route('/register_app', name: 'index_app')]
    public function index(): Response
    {
        $registers = $this->registerRepository->findAll();
        return $this->render('registration/index.html.twig', [

            'registers' => $registers,
        ]);
    }



    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, AppCustomAuthenticator $authenticator, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();


            $this->addFlash('success', 'Collaborateur ajouté avec succès');

            return $this->redirectToRoute('index_app');

        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    /*   public function authenticate(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, AppCustomAuthenticator $authenticator, EntityManagerInterface $entityManager){
           $user = new User();
           return $userAuthenticator->authenticateUser(
               $user,
               $authenticator,
               $request
           );

       }
   */
    #[Route('/register/delete/{id}', name: 'register_delete')]
    public function delete(User $register): Response
    {
        $this->entityManager->remove($register);
        $this->entityManager->flush();
        $this->addFlash(
            'success',
            'Your register was removed'
        );

        return $this->redirectToRoute('index_app');

    }

    #[Route('/user/edit/{id}', name: 'user_edit')]
    public function edit(User $user, Request $request): Response
    {

        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();

            $this->entityManager->persist($user);
            $this->entityManager->flush();

            $this->addFlash(
                'success',
                'Your collaborator was updated'
            );

            return $this->redirectToRoute('index_app');
        }

        return $this->renderForm('registration/edite.html.twig', [
            'registrationForm' => $form,
        ]);

    }

    #[Route('/user/show/{id}', name: 'user_show')]
    public function show(User $user, Request $request): Response
    {

        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
        }
        return $this->renderForm('registration/show.html.twig', [
            'user' => $user,
        ]);

    }



}
