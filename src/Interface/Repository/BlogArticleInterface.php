<?php

declare(strict_types=1);

namespace App\Interface\Repository;

use App\Entity\BlogArticle;

/**
 * @template T
 */
interface BlogArticleInterface
{
    /**
     * @return array<int, BlogArticle>
     */
    public function findAllBlogArticles(): array;

    public function add(BlogArticle $entity, bool $flush = true): void;

    public function remove(BlogArticle $entity, bool $flush = true): void;
}
