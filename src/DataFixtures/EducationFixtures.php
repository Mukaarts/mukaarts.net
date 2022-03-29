<?php

namespace App\DataFixtures;

use App\Entity\Education;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EducationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i < 3; ++$i) {
            $education = new Education();
            $education
                ->setSchool('School '.$i)
                ->setField('Field '.$i)
                ->setStartDate(new \DateTimeImmutable())
            ;

            $manager->persist($education);
        }

        $manager->flush();
    }
}
