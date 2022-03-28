<?php

declare(strict_types=1);

namespace App\Interface\Repository;

use App\Entity\Skill;

/**
 * @template T
 */
interface SkillInterface
{
    /**
     * @return array<int, Skill>
     */
    public function findAllSkills(): array;

    public function add(Skill $entity, bool $flush = true): void;

    public function remove(Skill $entity, bool $flush = true): void;
}
