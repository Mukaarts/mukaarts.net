<?php

namespace App\DataFixtures;

use App\Entity\Career;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CareerFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i < 3; ++$i) {
            $career = new Career();
            $career
                ->setCompany('Company '.$i)
                ->setStartDate(new \DateTimeImmutable())
            ;
            $manager->persist($career);
        }

        $manager->flush();
    }
}
