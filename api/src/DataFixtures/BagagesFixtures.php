<?php
namespace App\DataFixtures;
use App\Entity\Bagages;
use App\Entity\Clients;
use App\Entity\Employes;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class BagagesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $clients = $manager->getRepository(Clients::class)->findAll();

        $bagagesData = [
            [$clients[0], NULL, NULL],
            [$clients[1], 30, TRUE],
        ];

        foreach ($bagagesData as [$client, $poid, $soute]) {
            $bagages = new Bagages();
            $bagages->setClient($client);
            $bagages->setPoid($poid);
            $bagages->setSoute($soute);

            $manager->persist($bagages);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            ClientsFixtures::class,
        );
    }
}
