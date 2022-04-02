<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\BlogArticle;
use App\Interface\Repository\BlogArticleInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @template T
 * @extends ServiceEntityRepository<BlogArticle>
 * @template-implements BlogArticleInterface<BlogArticle>
 */
class BlogArticleRepository extends ServiceEntityRepository implements BlogArticleInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BlogArticle::class);
    }

    /**
     * @return array<int, BlogArticle>
     */
    public function findAllBlogArticles(): array
    {
        return $this->findAll();
    }

    public function add(BlogArticle $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function remove(BlogArticle $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }
}
