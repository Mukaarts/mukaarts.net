<?php

declare(strict_types=1);

namespace App\Entity;

use App\Entity\Traits\IdTrait;
use App\Repository\TestimonialRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation\Uploadable;
use Vich\UploaderBundle\Mapping\Annotation\UploadableField;

#[Uploadable]
#[Entity(repositoryClass: TestimonialRepository::class)]
class Testimonial
{
    use IdTrait;

    #[Column(type: Types::STRING)]
    private string $name;

    #[Column(type: Types::STRING)]
    private string $position;

    #[Column(type: Types::STRING)]
    private string $testimonial;

    #[Column(type: Types::STRING, nullable: true)]
    private ?string $image = null;

    #[UploadableField(mapping: 'testimonial_image', fileNameProperty: 'image')]
    private ?File $imageFile = null;

    #[Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $updatedImageAt = null;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Testimonial
    {
        $this->name = $name;

        return $this;
    }

    public function getPosition(): string
    {
        return $this->position;
    }

    public function setPosition(string $position): Testimonial
    {
        $this->position = $position;

        return $this;
    }

    public function getTestimonial(): string
    {
        return $this->testimonial;
    }

    public function setTestimonial(string $testimonial): Testimonial
    {
        $this->testimonial = $testimonial;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): Testimonial
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
