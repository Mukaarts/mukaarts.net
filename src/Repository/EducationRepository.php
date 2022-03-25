<?php

namespace App\Repository;

use App\Entity\Education;
use App\Interface\Repository\EducationInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @template T
 * @extends ServiceEntityRepository<Education>
 * @template-implements EducationInterface<Education>
 */
class EducationRepository extends ServiceEntityRepository implements EducationInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Education::class);
    }

    /**
     * @return array<int, Education>
     */
    public function findAll(): array
    {
        return $this->findBy([], ['id' => 'DESC']);
    }

    public function add(Education $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function remove(Education $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }
}
