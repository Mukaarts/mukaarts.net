<?php

namespace App\DataFixtures;

use App\Entity\Course;
use App\Entity\Mentor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CourseFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i < 10; ++$i) {
            $mentor = null;
            if (0 == rand(0, 1)) {
                /** @var Mentor $mentor */
                $mentor = $this->getReference('mentor-'.rand(1, 3));
            }

            $course = new Course();
            $course
                ->setTitle('Course '.$i)
                ->setStartDate(new \DateTimeImmutable())
                ->setMentor($mentor)
            ;

            $manager->persist($course);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            MentorFixtures::class,
        ];
    }
}
