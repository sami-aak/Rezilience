<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use App\Repository\ModuleRepository;

#[IsGranted('ROLE_USER')]
class ModulesController extends AbstractController
{
    private ModuleRepository $moduleRepository;

    public function __construct(ModuleRepository $moduleRepository)
    {
        $this->moduleRepository = $moduleRepository;
    }
    
    #[Route('/modules', name: 'app_modules')]
    public function index(): Response
    {
        $modules = $this->moduleRepository->findAll();
        return $this->render('modules/index.html.twig', [
            'controller_name' => 'ModulesController',
            'modules' => $modules,
        ]);
    }
}
