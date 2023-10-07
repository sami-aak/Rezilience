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
        'nom_module' => "Etat des lieux",
        'description_module' => "L'état des lieux est la première étape pour concrétiser son projet professionnel.
        Grâce à ce premier board (page sur laquelle vous êtes actuellement), faisons le point sur vos, vos attentes et vos capacités ! Cette étape est découpée en 2 parties : définir son projet professionnel et définir ses compétences.",
      ],
      [
        'nom_module' => "Créer ses outils",
        'description_module' => "Après avoir réalisé l'état des lieux et défini votre projet professionnel, il vous faut maintenant créer vos outils. Les outils sont le CV, la lettre, le mail de motivation et le profil Linkedin. Ce board est composé de la partie théorique et de la partie pratique",
      ],
      [
        'nom_module' => "Connaître son environnement",
        'description_module' => "Maintenant que vous avez créé vos outils, vous allez devoir apprendre à connaitre votre environnement ! L'environnement se compose de structures où postuler, des secteurs/domaines et des types de missions que vous souhaiteriez effectuer. Ce board est donc composé de 3 parties : les structures où l'on peut postuler, les secteurs et domaines où l'on aimerais travailler et le stypes de missions que l'on souhaiterais réaliser.",
      ],
      [
        'nom_module' => "Avoir confiance en soi",
        'description_module' => 'lorem ipsum',
      ],
      [
        'nom_module' => "Communiquer efficacement",
        'description_module' => 'lorem ipsum',
      ],
      [
        'nom_module' => "Commencer  à prospecter",
        'description_module' => 'lorem ipsum',
      ],
    ];
    foreach ($modules as $key => $moduleData) {
      $module = new Module();
      $module->setNomModule($moduleData['nom_module']);
      $module->setDescriptionModule($moduleData['description_module']);
      $manager->persist($module);
    }

    $manager->flush();
  }
}