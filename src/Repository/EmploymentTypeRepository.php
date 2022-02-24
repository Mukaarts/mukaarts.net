<?php

namespace App\Repository;

use App\Entity\EmploymentType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @template T
 * @extends ServiceEntityRepository<EmploymentType>
 */
class EmploymentTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EmploymentType::class);
    }
}
