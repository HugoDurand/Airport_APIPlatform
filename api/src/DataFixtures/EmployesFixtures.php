<?php
namespace App\DataFixtures;
use App\Entity\Employes;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class EmployesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $employesData = [
            ['Paul', 'Malherbe', 'Stewart'],
            ['Marie', 'Malherbe', 'Tarmac cleaner'],
        ];

        foreach ($employesData as [$nom, $prenom, $job]) {
            $employes = new Employes();
            $employes->setNom($nom);
            $employes->setPrenom($prenom);
            $employes->setJob($job);

            $manager->persist($employes);
        }
        $manager->flush();
    }
}

