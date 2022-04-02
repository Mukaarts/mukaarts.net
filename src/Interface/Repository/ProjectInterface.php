<?php

declare(strict_types=1);

namespace App\Interface\Repository;

use App\Entity\Project;

/**
 * @template T
 */
interface ProjectInterface
{
    /**
     * @return array<int, Project>
     */
    public function findAllProjects(): array;

    public function add(Project $entity, bool $flush = true): void;

    public function remove(Project $entity, bool $flush = true): void;
}
