<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Skill;
use App\Interface\Repository\SkillInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @template T
 * @extends ServiceEntityRepository<Skill>
 * @template-implements SkillInterface<Skill>
 */
class SkillRepository extends ServiceEntityRepository implements SkillInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Skill::class);
    }

    /**
     * @return array<int, Skill>
     */
    public function findAllSkills(): array
    {
        return $this->findAll();
    }

    public function add(Skill $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function remove(Skill $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }
}
