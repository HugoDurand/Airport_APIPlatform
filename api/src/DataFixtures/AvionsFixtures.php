<?php
namespace App\DataFixtures;
use App\Entity\Avions;
use App\Entity\Compagnies;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class AvionsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $compagnies = $manager->getRepository(Compagnies::class)->findAll();

        $avionsData = [
            ['Boeing 747', '500', $compagnies[0]],
            ['Airbus A380', '350', $compagnies[1]],
        ];

        foreach ($avionsData as [$type, $nombrePlaces, $compagnie]) {
            $avions = new Avions();
            $avions->setType($type);
            $avions->setNombrePlaces($nombrePlaces);
            $avions->setCompagnie($compagnie);
            $manager->persist($avions);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            CompagniesFixtures::class,
        );
    }
}
