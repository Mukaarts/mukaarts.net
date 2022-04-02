<?php

namespace App\DataFixtures;

use App\Entity\BlogArticle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BlogFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 10; ++$i) {
            $article = new BlogArticle();
            $article
                ->setTitle('Article '.$i)
                ->setContent('exemple de contenu '.$i)
                ->setCreatedAt(new \DateTimeImmutable())
                ->setIsPublished(true)
            ;
            $manager->persist($article);
        }

        $manager->flush();
    }
}
