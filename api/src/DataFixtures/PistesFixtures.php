<?php
namespace App\DataFixtures;
use App\Entity\Employes;
use App\Entity\Pistes;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class PistesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $employes = $manager->getRepository(Employes::class)->findAll();

        $pistesData = [
            ['U568RF', $employes],
            ['RT437J', $employes],
        ];

        foreach ($pistesData as [$numero, $employes]) {
            $pistes = new Pistes();
            $pistes->setNumero($numero);
            $pistes->addEmploye($employes[array_rand($employes)]);

            $manager->persist($pistes);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            EmployesFixtures::class,
        );
    }
}
