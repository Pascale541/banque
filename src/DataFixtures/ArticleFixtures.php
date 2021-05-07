<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Article;
use App\Entity\User;
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

        $user=new User();
        $user->setEmail('admin@gmail.com')
            ->setRoles(['ROLE_USER'])
            ->setPassword('$argon2id$v=19$m=65536,t=4,p=1$bkY3M2dlNU1LNTZxTG43WA$kmq+VqYME3vG3rOlRpFQTdEuL/L6ecUZpM43Odj5arI');

        $manager->persist($user);

        $manager->flush();
    }
}
