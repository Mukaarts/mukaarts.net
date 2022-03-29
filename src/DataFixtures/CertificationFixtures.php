<?php

namespace App\DataFixtures;

use App\Entity\Certification;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CertificationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i < 10; ++$i) {
            $certification = new Certification();
            $certification
                ->setTitle('Certification '.$i)
                ->setOrganization('Organization '.$i)
                ->setStartDate(new \DateTimeImmutable())
                ->setCertificationNumber('CERT-'.$i)
            ;

            $manager->persist($certification);
        }

        $manager->flush();
    }
}
