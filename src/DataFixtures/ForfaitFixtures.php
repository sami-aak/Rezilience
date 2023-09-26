<?php

namespace App\DataFixtures;

use App\Entity\Forfait;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ForfaitFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $forfait = new Forfait();
        $forfaits = [
            [
              // "forfait_id" => "1",
              'nom_forfait' => "Déterminer",
              'prix' => 200,
            ], 
            [
              // "forfait_id" => "1",
              'nom_forfait' => "Développer",
              'prix' => 500,
            ], 
            [
              // "forfait_id" => "1",
              'nom_forfait' => "Concrétiser",
              'prix' => 900,
            ],
        ];
        foreach ($forfaits as $key => $forfaitData) {
            $forfait = new Forfait();
            // $contenu->setforfait($contenuData['forfait_id']);
            $forfait->setNomforfait($forfaitData['nom_forfait']);
            $forfait->setPrix($forfaitData['prix']);

            $manager->persist($forfait);
        }
        $manager->flush();
    }
}
