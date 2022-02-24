<?php

namespace App\Repository;

use App\Entity\EmploymentType;
use App\Entity\EmploymentTypeTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @template T
 * @extends ServiceEntityRepository<EmploymentTypeTranslation>
 */
class EmploymentTypeTranslationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EmploymentType::class);
    }
}
