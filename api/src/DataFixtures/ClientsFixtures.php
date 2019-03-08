<?php
namespace App\DataFixtures;
use App\Entity\Clients;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ClientsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $clientsData = [
            ['BEAL', 'Nathalie', 'FR4567898765', '53', 'F', 'nath@gmail.com', 0345264731, '45 rue fegrat'],
            ['DURAND', 'Marc', 'EN2345432345', '58', 'M', 'marc@gmail.com', 0345264731, '45 rue fegrat'],
        ];

        foreach ($clientsData as [$nom, $prenom, $numeroTitreIdentite, $age, $sexe, $email, $tel, $adresse]) {
            $clients = new Clients();
            $clients->setNom($nom);
            $clients->setPrenom($prenom);
            $clients->setNumeroTitreIdentite($numeroTitreIdentite);
            $clients->setAge($age);
            $clients->setSexe($sexe);
            $clients->setEmail($email);
            $clients->setTel($tel);
            $clients->setAdresse($adresse);

            $manager->persist($clients);
        }
        $manager->flush();
    }
}

