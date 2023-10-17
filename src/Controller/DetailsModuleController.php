<?php

namespace App\Controller;

use App\Entity\Module;
use App\Repository\ContenuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_USER')]
class DetailsModuleController extends AbstractController
{
   #[Route('/details/module/{id}', name: 'app_details_module_id', requirements: ['id' => "\d+"])]
    public function index(Module $module, ContenuRepository $contenuRepository, int $id): Response
    {
        $contenu = $contenuRepository->findByModuleId($id);
        return $this->render('details_module/index.html.twig', [
            'controller_name' => 'DetailsModuleController',
            'module' => $module,
            'contenu' => $contenu,
        ]);
    }
}
