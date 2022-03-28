<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Testimonial;
use App\Interface\Repository\TestimonialInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @template T
 * @extends ServiceEntityRepository<Testimonial>
 * @template-implements TestimonialInterface<Testimonial>
 */
class TestimonialRepository extends ServiceEntityRepository implements TestimonialInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Testimonial::class);
    }

    /**
     * @return array<int, Testimonial>
     */
    public function findAllTestimonials(): array
    {
        return $this->findAll();
    }

    public function add(Testimonial $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function remove(Testimonial $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }
}
