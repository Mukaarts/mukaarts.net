<?php

declare(strict_types=1);

namespace App\Interface\Repository;

use App\Entity\Testimonial;

/**
 * @template T
 */
interface TestimonialInterface
{
    /**
     * @return array<int, Testimonial>
     */
    public function findAllTestimonials(): array;

    public function add(Testimonial $entity, bool $flush = true): void;

    public function remove(Testimonial $entity, bool $flush = true): void;
}
