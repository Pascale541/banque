<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Article;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        for($i=0; $i< 10 ; $i++){
            $article = new Article();
            $article ->setTitle($faker ->words(3,true) )
                     ->setDescription($faker ->text())
                     ->setPrix($faker->numberBetween(1, 10))
                     ->setDimension($faker ->text());

        $manager->persist($article);
    }

        $manager->flush();
    }
}
