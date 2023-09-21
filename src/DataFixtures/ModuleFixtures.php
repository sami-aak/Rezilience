<?php

namespace App\DataFixtures;

use App\Entity\Module;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ModuleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $module = new Module();
        $modules = [
            [
              // "module_id" => "1",
              'nom_module' => "Etat des lieux",
              'description_module' => 'lorem ipsum',
            ],
            [
              // "module_id" => "1",
              'nom_module' => "Créer ses outils",
              'description_module' => 'lorem ipsum',
            ],
            [
              // "module_id" => "1",
              'nom_module' => "Connaître son environnement",
              'description_module' => 'lorem ipsum',
            ],
            [
              // "module_id" => "1",
              'nom_module' => "Communiquer efficacement",
              'description_module' => 'lorem ipsum',
            ],
            [
              // "module_id" => "1",
              'nom_module' => "Commencer  à prospecter",
              'description_module' => 'lorem ipsum',
            ],
        ];
        foreach ($modules as $key => $moduleData) {
            $module = new Module();
            // $contenu->setModule($contenuData['module_id']);
            $module->setNommodule($moduleData['nom_module']);
            $module->setDescriptionmodule($moduleData['description_module']);

            $manager->persist($module);
        }
        $manager->flush();
    }
}

