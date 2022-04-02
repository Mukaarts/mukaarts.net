<?php

declare(strict_types=1);

namespace App\Entity;

use App\Entity\Traits\IdTrait;
use App\Repository\ProjectRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation\Uploadable;
use Vich\UploaderBundle\Mapping\Annotation\UploadableField;

#[Uploadable]
#[Entity(repositoryClass: ProjectRepository::class)]
class Project
{
    use IdTrait;

    public const TYPE_WEB = 0;

    private const TYPES = [
        self::TYPE_WEB => 'Web',
    ];

    #[Column(type: Types::STRING)]
    private string $title;

    #[Column(type: Types::TEXT)]
    private string $description;

    #[Column(type: Types::INTEGER)]
    private int $type;

    #[Column(type: Types::STRING, nullable: true)]
    private ?string $fileName = null;

    #[UploadableField(mapping: 'projects', fileNameProperty: 'fileName')]
    private ?File $file = null;

    #[Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $updatedFileAt = null;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Project
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Project
    {
        $this->description = $description;

        return $this;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function getTypeLabel(): string
    {
        return self::TYPES[$this->type];
    }

    public function setType(int $type): Project
    {
        $this->type = $type;

        return $this;
    }

    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    public function setFileName(?string $fileName): self
    {
        $this->fileName = $fileName;

        return $this;
    }

    public function getFile(): ?File
    {
        return $this->file;
    }

    public function setFile(?File $file): void
    {
        $this->file = $file;

        if (null !== $file) {
            $this->updatedFileAt = new \DateTimeImmutable();
        }
    }

    public function __toString(): string
    {
        return $this->title;
    }
}
