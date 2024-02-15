<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Contacts;
use App\Entity\Categorie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ContactsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        
        $categories = [];
        $fake = Factory::create('fr_FR');
        
        $category = new Categorie();
        $category->setLibelle("professionel")
                 ->setDescription("je suis un professionel")
                 ->setImage("https://picsum.photos/id/5/200/300");
        $manager -> persist($category);
        $categories[]= $category;

        $category = new Categorie();
        $category->setLibelle("sport")
                ->setDescription("Le sport, c'est moi!!")
                ->setImage("https://picsum.photos/id/73/200/300");
        $manager-> persist($category);
        $categories[]= $category;

        $category = new Categorie();
        $category->setLibelle("privé")
                ->setDescription("Défense d'entrer")
                ->setImage("https://picsum.photos/id/342/200/300");
        $manager->persist($category); 
        $categories[]= $category;

// categorieFixtures

        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create("fr_FR");
        $genres = ["male","female"];
        
        
        for ($i=0 ; $i < 100 ; $i++) { 
            $sexe = mt_rand(0,1);
            if ($sexe == 0) {
                $type = 'men';
            } else {
                $type = 'women';
            }
        $contact = new Contacts();
        $contact->setNom($faker->lastName())
                ->setPrenom($faker->firstName($genres[$sexe]))
                ->setRue($faker->streetAddress())
                ->setCp($faker->numberBetween(01000,98765))
                ->setVille($faker->city())
                ->setMail($faker->email())
                ->setSexe($sexe)
                ->setCategorie($categories[mt_rand(0,count($categories)-1)])
                ->setAvatar("https://randomuser.me/api/portraits/".$type."/".$i.".jpg");
                
        $manager->persist($contact);
    }
    $manager->flush();
}
}