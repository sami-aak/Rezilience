<?php

namespace App\Controller;

use App\Form\UserModificationType;
use App\Repository\UserRepository;
use App\Security\Authenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

#[IsGranted('ROLE_USER')]
class UserModificationController extends AbstractController
{
    #[Route('/user/modification/{id}', name: 'app_user_modification_id', requirements: ['id' => "\d+"])]
         
    public function register(UserRepository $userRepository, int $id, Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, Authenticator $authenticator, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        $form = $this->createForm(UserModificationType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $userRepository->save($user, true);
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );
            $user->setRoles(['ROLE_USER']);

            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $userAuthenticator->authenticateUser(
                $user,
                $authenticator,
                $request
            );
            // $this->addFlash('success', 'Informations modifiées !');

            // return $this->redirectToRoute('app_home');
        }
        return $this->render('user_modification/index.html.twig', [
            'controller_name' => 'UserModificationController',
            'user' => $user,
            'modificationForm' => $form->createView(),
        ]);
    }
}
