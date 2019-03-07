<?php
namespace App\DataFixtures;
use App\Entity\Clients;
use App\Entity\Reservations;
use App\Entity\Vols;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ReservationsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $vols = $manager->getRepository(Vols::class)->findAll();
        $clients = $manager->getRepository(Clients::class)->findAll();

        $reservationsData = [
            ['IH7980', $clients, $vols[0], 'business', FALSE],
            ['RE456Z', $clients, $vols[1], 'economique', TRUE],
        ];

        foreach ($reservationsData as [$numero, $clients, $vol, $classe, $checkIn]) {
            $reservations = new Reservations();
            $reservations->setNumero($numero);
            $reservations->addClient($clients[array_rand($clients)]);
            $reservations->setVol($vol);
            $reservations->setClasse($classe);
            $reservations->setCheckIn($checkIn);

            $manager->persist($reservations);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            ClientsFixtures::class,
            VolsFixtures::class,
        );
    }
}

