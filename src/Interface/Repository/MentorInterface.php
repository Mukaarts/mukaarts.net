<?php

declare(strict_types=1);

namespace App\Interface\Repository;

use App\Entity\Mentor;

/**
 * @template T
 */
interface MentorInterface
{
    /**
     * @return array<int, Mentor>
     */
    public function findAllMentors(): array;

    public function add(Mentor $entity, bool $flush = true): void;

    public function remove(Mentor $entity, bool $flush = true): void;
}
