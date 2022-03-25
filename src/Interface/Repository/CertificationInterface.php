<?php

declare(strict_types=1);

namespace App\Interface\Repository;

use App\Entity\Certification;

/**
 * @template T
 */
interface CertificationInterface
{
    /**
     * @return array<int, Certification>
     */
    public function findAll(): array;

    public function add(Certification $entity, bool $flush = true): void;

    public function remove(Certification $entity, bool $flush = true): void;
}
