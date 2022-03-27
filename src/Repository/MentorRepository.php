<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Mentor;
use App\Interface\Repository\MentorInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @template T
 * @extends ServiceEntityRepository<Mentor>
 * @template-implements MentorInterface<Mentor>
 */
class MentorRepository extends ServiceEntityRepository implements MentorInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Mentor::class);
    }

    /**
     * @return array<int, Mentor>
     */
    public function findAllMentors(): array
    {
        return $this->findAll();
    }

    public function add(Mentor $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function remove(Mentor $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }
}
