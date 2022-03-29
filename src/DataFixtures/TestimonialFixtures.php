<?php

namespace App\DataFixtures;

use App\Entity\Testimonial;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TestimonialFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i < 4; ++$i) {
            $testimonial = new Testimonial();
            $testimonial->setName('John Doe');
            $testimonial->setPosition('CEO');
            $testimonial->setTestimonial('some text');

            $manager->persist($testimonial);
        }

        $manager->flush();
    }
}
