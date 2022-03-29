<?php

namespace App\DataFixtures;

use App\Entity\Skill;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SkillFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i < 10; ++$i) {
            $skill = new Skill();
            $skill
                ->setTitle('Skill '.$i)
                ->setExperience(rand(0, 2))
            ;

            $manager->persist($skill);
        }

        $manager->flush();
    }
}
