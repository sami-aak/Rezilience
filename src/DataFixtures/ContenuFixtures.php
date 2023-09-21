<?php

namespace App\DataFixtures;

use App\Entity\Contenu;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ContenuFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $contenu = new Contenu();
        $contenus = [
            [
              // "module_id" => "1",
              'nom_fichier' => 'Video 3',
              'type_fichier' => 'Video',
              'lien_fichier' => "C:\Users\henrio\Videos\introduction1.mp4",
            ],
            [
              // "module_id" => "4",
              'nom_fichier' => 'Image 7',
              'type_fichier' => 'Image',
              'lien_fichier' => "C:\Users\henrio\Images\Logo.png",
            ],
            [
              // "module_id" => "3",
              'nom_fichier' => 'Video 54',
              'type_fichier' => 'Video',
              'lien_fichier' => "C:\Users\henrio\Videos\communication2.mp4",
            ],
        ];
        foreach ($contenus as $key => $contenuData) {
            $contenu = new Contenu();
            // $contenu->setModule($contenuData['module_id']);
            $contenu->setNomFichier($contenuData['nom_fichier']);
            $contenu->setTypeFichier($contenuData['type_fichier']);
            $contenu->setLienFichier($contenuData['lien_fichier']);

            $manager->persist($contenu);
        }
        $manager->flush();
    }
}
