<?php

namespace App\DataFixtures;

use App\Entity\Formation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FormationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $formation = new Formation();
        $formations = [
            [
              // "module_id" => "1",
              'nom_formation' => "Stratégie de retour à l'emploi",
              'description_formation' => 'lorem ipsum',
            ]
        ];
        foreach ($formations as $key => $formationData) {
            $formation = new Formation();
            // $contenu->setModule($contenuData['module_id']);
            $formation->setNomFormation($formationData['nom_formation']);
            $formation->setDescriptionFormation($formationData['description_formation']);

            $manager->persist($formation);
        }
        $manager->flush();
    }
}
