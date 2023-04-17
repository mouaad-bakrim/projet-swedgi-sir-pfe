<?php

namespace App\DataFixtures;

use App\Entity\Client;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TypeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $tag = new Client();
        $tag->setType('SARL');
        $tag->setType('SARL AU');
        $tag->setType('PP');
        $manager->persist($tag);

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
