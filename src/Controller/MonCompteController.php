<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_USER')]
class MonCompteController extends AbstractController
{
    
    #[Route('/mon/compte/{id}', name: 'app_mon_compte_id', requirements: ['id' => "\d+"])]
    public function index(UserRepository $userRepository, int $id): Response
    {
        $users = $userRepository->findByUserId($id);
        return $this->render('mon_compte/index.html.twig', [
            'controller_name' => 'MonCompteController',
            'users' => $users,
        ]);
    }
}
