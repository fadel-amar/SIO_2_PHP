<?php

namespace App\DataFixtures;

use App\Entity\Etudiant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class EtudiantFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Créer un objet de type faker
        $faker = Factory::create("fr_FR");
        // Générer 100 étudiants
        for ($i = 1 ; $i <100 ; $i++) {
            // Créer un étudiant
            $etudiant = new  Etudiant();
            $etudiant->setPrenom($faker->firstName);
            $etudiant->setNom($faker->lastName);
            $etudiant->setEmail($faker->email);
            $etudiant->setDateNaissance($faker->dateTimeBetween('-28 years', '-17 years'));
            // Persister l'étudiant
            // Doctrine va générer un INSERT INTO
            $manager->persist($etudiant);
        }

        $manager->flush();
    }
}
