<?php

declare(strict_types=1);

namespace App\Interface\Repository;

use App\Entity\Course;

/**
 * @template T
 */
interface CourseInterface
{
    /**
     * @return array<int, Course>
     */
    public function findAllCourses(): array;

    public function add(Course $entity, bool $flush = true): void;

    public function remove(Course $entity, bool $flush = true): void;
}
