<?php
namespace App\DataFixtures;
use App\Entity\Compagnies;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CompagniesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
         $compagniesData=[
            ['Boeing 747', '500', 'Dubai'],
            ['Airbus A380', '350', 'France'],
        ];

        foreach ($compagniesData as [$nom, $origine]) {
            $compagnie = new Compagnies();
            $compagnie->setNom($nom);
            $compagnie->setOrigine($origine);
            $manager->persist($compagnie);
        }
        $manager->flush();
    }
}
