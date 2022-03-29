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

    #[Column(type: Types::STRING)]
    private string $title;

    #[Column(type: Types::TEXT)]
    private string $description;

    #[Column(type: Types::INTEGER)]
    private int $type;

    #[Column(type: Types::STRING, nullable: true)]
    private ?string $image = null;

    #[UploadableField(mapping: 'project_image', fileNameProperty: 'image')]
    private ?File $imageFile = null;

    #[Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $updatedImageAt = null;

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

    public function setType(int $type): Project
    {
        $this->type = $type;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageFile(?File $imageFile): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            $this->updatedImageAt = new \DateTimeImmutable();
        }
    }
}
