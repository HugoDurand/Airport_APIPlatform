<?php
namespace App\DataFixtures;
use App\Entity\Aeroports;
use App\Entity\Avions;
use App\Entity\Employes;
use App\Entity\Pistes;
use App\Entity\Vols;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class VolsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $avions = $manager->getRepository(Avions::class)->findAll();
        $aeroports = $manager->getRepository(Aeroports::class)->findAll();
        $pistes = $manager->getRepository(Pistes::class)->findAll();
        $employes = $manager->getRepository(Employes::class)->findAll();

        $aeroportsData = [
            ['U568RF', $avions[0], new \DateTime(), new \DateTime('+1 hour'), $aeroports[0], $aeroports[1], 300, $pistes[0], FALSE, $employes],
            ['RT437J', $avions[1], new \DateTime(), new \DateTime('+1 hour'), $aeroports[1], $aeroports[0], 200, $pistes[1], FALSE, $employes],
        ];

        foreach ($aeroportsData as [$numero, $avion, $heureDepart, $heureArrivee, $aeroportDepart, $aeroportArrivee, $prix, $piste, $escales, $employes]) {
            $aeroports = new Vols();
            $aeroports->setNumero($numero);
            $aeroports->setAvion($avion);
            $aeroports->setHeureDepart($heureDepart);
            $aeroports->setHeureArrivee($heureArrivee);
            $aeroports->setAeroportDepart($aeroportDepart);
            $aeroports->setAeroportArrivee($aeroportArrivee);
            $aeroports->setPrix($prix);
            $aeroports->setPiste($piste);
            $aeroports->setEscales($escales);
            $aeroports->addEmploye($employes);

            $manager->persist($aeroports);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            AvionsFixtures::class,
            AeroportsFixtures::class,
            PistesFixtures::class,
            EmployesFixtures::class,
        );
    }
}
