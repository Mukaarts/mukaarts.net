<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Course;
use App\Interface\Repository\CourseInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @template T
 * @extends ServiceEntityRepository<Course>
 * @template-implements CourseInterface<Course>
 */
class CourseRepository extends ServiceEntityRepository implements CourseInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Course::class);
    }

    /**
     * @return array<int, Course>
     */
    public function findAllCourses(): array
    {
        return $this->findAll();
    }

    public function add(Course $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function remove(Course $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }
}
