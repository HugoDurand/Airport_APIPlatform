<?php
namespace App\DataFixtures;
use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UsersFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $usersData = [
            ['machin@gmail.com', ['ROLE_USER'], 'myPassword'],
            ['truc@gmail.com', ['ROLE_USER'], 'myPassword2'],
        ];

        foreach ($usersData as [$email, $roles, $password]) {
            $users = new Users();
            $users->setEmail($email);
            $users->setRoles($roles);
            $users->setPassword($this->passwordEncoder->encodePassword($users, $password));

            $manager->persist($users);

            $this->addReference($email, $users);
        }
        $manager->flush();
    }
}

