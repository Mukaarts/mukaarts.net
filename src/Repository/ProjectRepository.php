<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Project;
use App\Interface\Repository\ProjectInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @template T
 * @extends ServiceEntityRepository<Project>
 * @template-implements ProjectInterface<Project>
 */
class ProjectRepository extends ServiceEntityRepository implements ProjectInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Project::class);
    }

    /**
     * @return array<int, Project>
     */
    public function findAllProjects(): array
    {
        return $this->findAll();
    }

    public function add(Project $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function remove(Project $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }
}
