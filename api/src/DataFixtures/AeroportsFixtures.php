<?php
namespace App\DataFixtures;
use App\Entity\Aeroports;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AeroportsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $aeroportsData = [
            ['Charles de Gaulles', 'France'],
            ['JFK', 'USA'],
        ];

        foreach ($aeroportsData as [$nom, $pays]) {
            $aeroports = new Aeroports();
            $aeroports->setNom($nom);
            $aeroports->setPays($pays);
            $manager->persist($aeroports);
        }
        $manager->flush();
    }
}
