<?php

namespace App\Controller;

use App\Entity\Module;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailsModuleController extends AbstractController
{
   #[Route('/details/module/{id}', name: 'app_details_module_id', requirements: ['id' => "\d+"])]
    public function index(Module $module): Response
    {
        return $this->render('details_module/index.html.twig', [
            'controller_name' => 'DetailsModuleController',
            'module' => $module,
        ]);
    }
}
