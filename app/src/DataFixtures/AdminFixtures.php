<?php

namespace App\DataFixtures;

use App\Entity\Admin;
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
        $admin = new Admin();
        $admin->setEmail('admin2020@gmail.com');
        $admin->setPassword($this->hasher->hashPassword($admin,'admin1234'));
        $admin->setUsername('admin');
        $admin->setRoles(["ROLE_ADMIN"]);
        $manager->persist($admin);



        $manager->flush();
    }
}
