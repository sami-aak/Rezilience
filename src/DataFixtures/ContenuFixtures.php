<?php

namespace App\DataFixtures;

use App\Entity\Contenu;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ContenuFixtures extends Fixture
{
  public function load(ObjectManager $manager): void
  {
    $contenus = [
      [
        'nom_fichier' => 'Titre 1',
        'type_fichier' => 'Titre',
        'lien_fichier' => "",
        'description' => "L'arbre de vie",
      ],
      [
        'nom_fichier' => 'Texte 1',
        'type_fichier' => 'Texte',
        'lien_fichier' => "",
        'description' => "Avec l'arbre de vie, prenez du recul sur votre vie pour faire le bilan",
      ],
      [
        'nom_fichier' => 'Titre 2',
        'type_fichier' => 'Titre',
        'lien_fichier' => "",
        'description' => "La route de la réussite",
      ],
      [
        'nom_fichier' => 'Texte 2',
        'type_fichier' => 'Texte',
        'lien_fichier' => "",
        'description' => "Grâce à la route de la réussite, déterminez comment atteindre vos objectifs de manière claire",
      ],
      [
        'nom_fichier' => 'Titre 3',
        'type_fichier' => 'Titre',
        'lien_fichier' => "",
        'description' => "Vos compétences",
      ],
      [
        'nom_fichier' => 'Texte 3',
        'type_fichier' => 'Texte',
        'lien_fichier' => "",
        'description' => "Définissez vos différentes compétences selon 3 catégories",
      ],
      [
        'nom_fichier' => 'Titre 4',
        'type_fichier' => 'Titre',
        'lien_fichier' => "",
        'description' => "Votre coach",
      ],
      [
        'nom_fichier' => 'Texte 4',
        'type_fichier' => 'Texte',
        'lien_fichier' => "",
        'description' => "Laetitia reste disponible pour vous aider. N'hésitez pas à la contacter !",
      ],
      [
        'nom_fichier' => 'Petit a',
        'type_fichier' => 'Titre',
        'lien_fichier' => "",
        'description' => "Définir son projet professionnel",
      ],
      [
        'nom_fichier' => 'Petit b',
        'type_fichier' => 'Titre',
        'lien_fichier' => "",
        'description' => "Définir ses compétences",
      ],
      [
        'nom_fichier' => 'Titre 1',
        'type_fichier' => 'Titre',
        'lien_fichier' => "",
        'description' => "Créer son CV",
      ],
      [
        'nom_fichier' => 'Texte 1',
        'type_fichier' => 'Texte',
        'lien_fichier' => "",
        'description' => "Le CV est une page A4 qui résume votre activité professionnelle ce qui déclenche la prise de RDV",
      ],
      [
        'nom_fichier' => 'Titre 2',
        'type_fichier' => 'Titre',
        'lien_fichier' => "",
        'description' => "Rédiger sa lettre/mail de motivation",
      ],
      [
        'nom_fichier' => 'Texte 2',
        'type_fichier' => 'Texte',
        'lien_fichier' => "",
        'description' => "La lettre de motivation explique pourquoi vous postulez et ce que vous pensez apporter à l'entreprise",
      ],
      [
        'nom_fichier' => 'Titre 3',
        'type_fichier' => 'Titre',
        'lien_fichier' => "",
        'description' => "Construire son profil Linkedin",
      ],
      [
        'nom_fichier' => 'Texte 3',
        'type_fichier' => 'Texte',
        'lien_fichier' => "",
        'description' => "Linkedin est le réseau social des professionnels, il permet de créer son réseau et des opportunités",
      ],
      [
        'nom_fichier' => 'Titre 4',
        'type_fichier' => 'Titre',
        'lien_fichier' => "",
        'description' => "C'est à vous",
      ],
      [
        'nom_fichier' => 'Texte 4',
        'type_fichier' => 'Texte',
        'lien_fichier' => "",
        'description' => "Laetitia reste disponible pour vous aider. Contactez-la dès que vous avez besoin d'aide ou finit",
      ],
      [
        'nom_fichier' => 'Petit a',
        'type_fichier' => 'Titre',
        'lien_fichier' => "",
        'description' => "Théorique",
      ],
      [
        'nom_fichier' => 'Petit b',
        'type_fichier' => 'Titre',
        'lien_fichier' => "",
        'description' => "Pratique",
      ],
      [
        'nom_fichier' => 'Titre 1',
        'type_fichier' => 'Titre',
        'lien_fichier' => "",
        'description' => "Les différents types de structures",
      ],
      [
        'nom_fichier' => 'Texte 1',
        'type_fichier' => 'Texte',
        'lien_fichier' => "",
        'description' => "Il existe plusieurs types de structures d'entreprises. A vous de déterminer lesquelles vous correspondent !",
      ],
      [
        'nom_fichier' => 'Titre 2',
        'type_fichier' => 'Titre',
        'lien_fichier' => "",
        'description' => "Les différents types de secteurs/domaines",
      ],
      [
        'nom_fichier' => 'Texte 2',
        'type_fichier' => 'Texte',
        'lien_fichier' => "",
        'description' => "Les entreprises appartiennent chacune à un domaine, un secteur d'activité. Déterminez les secteurs qui vous correspondent.",
      ],
      [
        'nom_fichier' => 'Titre 3',
        'type_fichier' => 'Titre',
        'lien_fichier' => "",
        'description' => "Les différentes missions possibles",
      ],
      [
        'nom_fichier' => 'Texte 3',
        'type_fichier' => 'Texte',
        'lien_fichier' => "",
        'description' => "Au sein de l'entreprise, quelles actions souhaiteriez vous réaliser ? Quel poste est fait pour vous ?",
      ],
      [
        'nom_fichier' => 'Titre 4',
        'type_fichier' => 'Titre',
        'lien_fichier' => "",
        'description' => "C'est à vous",
      ],
      [
        'nom_fichier' => 'Texte 4',
        'type_fichier' => 'Texte',
        'lien_fichier' => "",
        'description' => "Laetitia reste disponible pour vous aider. Contactez-la dès que vous avez besoin d'aide ou finit",
      ],
      [
        'nom_fichier' => 'Petit a',
        'type_fichier' => 'Titre',
        'lien_fichier' => "",
        'description' => "Connaître son environnement",
      ],
      [
        'nom_fichier' => 'Petit b',
        'type_fichier' => 'Titre',
        'lien_fichier' => "",
        'description' => "On partage ?",
      ],
    ]; 

      foreach ($contenus as $contenuData) {
        $contenu = new Contenu();
        $contenu->setNomFichier($contenuData['nom_fichier']);
        $contenu->setTypeFichier($contenuData['type_fichier']);
        $contenu->setLienFichier($contenuData['lien_fichier']);
        $contenu->setDescription($contenuData['description']);
        $manager->persist($contenu);
      }

      $manager->flush();
  }
}