<?php

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProjectFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 10; ++$i) {
            $project = new Project();
            $project
                ->setTitle('Project '.$i)
                ->setDescription('Description '.$i)
                ->setType(0)
            ;

            $manager->persist($project);
        }

        $manager->flush();
    }
}
