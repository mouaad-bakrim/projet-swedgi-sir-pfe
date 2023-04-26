<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AdminFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $hasher)
    {}

    public function load(ObjectManager $manager): void
    {
        $admin = new User();
        $admin->setEmail('benzireda96@gmail.com');
        $admin->setPassword($this->hasher->hashPassword($admin,'admin1234'));
        $admin->setRoles(["ROLE_ADMIN"]);
        $manager->persist($admin);
        $admin2 = new User();
        $admin2->setEmail('collaborateur@gmail.com');
        $admin2->setPassword($this->hasher->hashPassword($admin2,'admin1234'));
        $admin2->setRoles(["ROLE_COLLABORATEUR"]);
        $manager->persist($admin2);

        $admin3 = new User();
        $admin3->setEmail('responsable@gmail.com');
        $admin3->setPassword($this->hasher->hashPassword($admin3,'admin1234'));
        $admin3->setRoles(["ROLE_RESPONSABLE"]);
        $manager->persist($admin3);

        $manager->flush();
    }
}
