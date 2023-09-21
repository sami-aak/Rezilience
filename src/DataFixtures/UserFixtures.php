<?php

namespace App\DataFixtures;

use App\Entity\User;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    protected UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $users = [
            [
                'nom' => 'Dupont',
                'prenom' => 'Paul',
                'date_de_naissance' => '17-05-2000',
                'email' => 'pauldupont@gmail.com',
                'password' => 'paul',
                'roles' => ['ROLE_ADMIN'],
                'domaine_activite' => 'marketing',
                'exp_pro' => 4,
                'date_creation' => '05-09-2023 12:43:21',
                'date_maj' => '05-09-2023 12:43:21',
                'date_connexion' => '05-09-2023 12:43:21',
                'expiration_abonnement' => '26-12-2023',
            ],
            [
              'nom' => 'Skywalker',
              'prenom' => 'Luke',
              'date_de_naissance' => '13-09-1980',
              'email' => 'luke@gmail.com',
              'password' => 'luke',
              'roles' => ['ROLE_USER'],
              'domaine_activite' => 'communication',
              'exp_pro' => 5,
              'date_creation' => '05-09-2023 12:43:21',
              'date_maj' => '05-09-2023 12:43:21',
              'date_connexion' => '05-09-2023 12:43:21',
              'expiration_abonnement' => '12-06-2024',
            ],
            [
              'nom' => 'Solo',
              'prenom' => 'Han',
              'date_de_naissance' => '19-07-1965',
              'email' => 'hsolo@gmail.com',
              'password' => 'han',
              'roles' => ['ROLE_USER'],
              'domaine_activite' => 'contrebandier',
              'exp_pro' => 12,
              'date_creation' => '05-09-2023 12:43:21',
              'date_maj' => '05-09-2023 12:43:21',
              'date_connexion' => '05-09-2023 12:43:21',
              'expiration_abonnement' => '05-09-2023',
            ],
        ];

        foreach ($users as $key => $userData) {
            $user = new User();
            $user->setNom($userData['nom']);
            $user->setPrenom($userData['prenom']);
            $user->setDateDeNaissance(new \DateTime($userData['date_de_naissance']));
            $user->setEmail($userData['email']);
            $user->setRoles($userData['roles']);
            $password = $this->hasher->hashPassword($user, $userData['password']);
            $user->setPassword($password);
            $user->setDomaineActivite($userData['domaine_activite']);
            $user->setExpPro($userData['exp_pro']);
            $user->setDateCreation(new DateTimeImmutable($userData['date_creation']));
            // $user->setDateMaj(new DateTimeImmutable($userData['date_maj']));
            $user->setDateConnexion(new DateTimeImmutable($userData['date_connexion']));
            $user->setExpirationAbonnement(new DateTimeImmutable($userData['expiration_abonnement']));

            $manager->persist($user);
        }

        $manager->flush();
    }
}
