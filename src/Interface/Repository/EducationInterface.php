<?php

declare(strict_types=1);

namespace App\Interface\Repository;

use App\Entity\Education;

/**
 * @template T
 */
interface EducationInterface
{
    /**
     * @return array<int, Education>
     */
    public function findAll(): array;
}
