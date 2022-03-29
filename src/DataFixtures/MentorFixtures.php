<?php

namespace App\DataFixtures;

use App\Entity\Mentor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MentorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i < 4; ++$i) {
            $mentor = new Mentor();
            $mentor
                ->setName('Mentor '.$i)
            ;

            $this->addReference('mentor-'.$i, $mentor);
            $manager->persist($mentor);
        }

        $manager->flush();
    }
}
