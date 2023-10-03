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
              'nom_formation' => "Stratégie de retour à l'emploi",
              'description_formation' => "VOUS ÊTES EN PLEINE RÉFLEXION SUR VOTRE CARRIÈRE PROFESSIONNELLE, APRÈS OU PENDANT VOTRE FORMATION VOUS AVEZ ENVIE DE RETROUVER UN EMPLOI RAPIDEMENT ?
              Avec RéZilience, mettez en place une stratégie de retour à l'emploi. Avec notre expertise, nous vous accompagnons dans la recherche de vos compétences transversales. Grâce au parcours d'accompagnement personnalisé vous saurez:
              
              Déterminer les points forts de votre candidature
              Construire des outils adaptés au domaine de reconversion visé
              Retrouver confiance et légitimité dans votre projet professionnel",
            ]
        ];
        foreach ($formations as $key => $formationData) {
            $formation = new Formation();
            $formation->setNomFormation($formationData['nom_formation']);
            $formation->setDescriptionFormation($formationData['description_formation']);

            $manager->persist($formation);
        }
        $manager->flush();
    }
}
