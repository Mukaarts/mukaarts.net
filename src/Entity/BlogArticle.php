<?php

declare(strict_types=1);

namespace App\Entity;

use App\Entity\Traits\IdTrait;
use App\Repository\BlogArticleRepository;
use DateTimeImmutable as Date;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;

#[Entity(repositoryClass: BlogArticleRepository::class)]
class BlogArticle
{
    use IdTrait;

    #[Column(type: Types::STRING)]
    private string $title;

    #[Column(type: Types::TEXT)]
    private string $content;

    #[Column(type: Types::DATETIME_IMMUTABLE)]
    private Date $createdAt;

    #[Column(type: Types::BOOLEAN)]
    private bool $isPublished = true;

    public function __construct()
    {
        $this->createdAt = new Date();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): BlogArticle
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): BlogArticle
    {
        $this->content = $content;

        return $this;
    }

    public function getCreatedAt(): Date
    {
        return $this->createdAt;
    }

    public function setCreatedAt(Date $createdAt): BlogArticle
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function isPublished(): bool
    {
        return $this->isPublished;
    }

    public function setIsPublished(bool $isPublished): BlogArticle
    {
        $this->isPublished = $isPublished;

        return $this;
    }
}
