<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Contacts;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ContactsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create("fr_FR");
        $genres = ["male","female"];
        $contact = new Contacts();
        $contact->setNom('$faker->firstName()')
                ->setPrenom('$faker->lastName()');
        $manager->flush();
    }
}
