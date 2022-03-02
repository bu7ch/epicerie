<?php

namespace App\DataFixtures;

use App\Entity\Aliment;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $a1= new Aliment();
        $a1->setName('carotte')
        ->setPrice(1.80)
        ->setCalorie(36)
        ->setProteine(0.77)
        ->setGlucide(5.3)
        ->setLipide(0.26)
        ->setImage('carotte.jpeg');
        $manager->persist($a1);

        $a2= new Aliment();
        $a2->setName('tomate')
        ->setPrice(1.80)
        ->setCalorie(36)
        ->setProteine(0.77)
        ->setGlucide(5.3)
        ->setLipide(0.26)
        ->setImage('tomate.jpeg');
        $manager->persist($a2);

        $a3= new Aliment();
        $a3->setName('patate')
        ->setPrice(1.80)
        ->setCalorie(36)
        ->setProteine(0.77)
        ->setGlucide(5.3)
        ->setLipide(0.26)
        ->setImage('patate.jpeg');
        $manager->persist($a3);

        $a4= new Aliment();
        $a4->setName('pomme')
        ->setPrice(1.80)
        ->setCalorie(36)
        ->setProteine(0.77)
        ->setGlucide(5.3)
        ->setLipide(0.26)
        ->setImage('pomme.jpeg');
        $manager->persist($a4);

        $manager->flush();
    }
}
