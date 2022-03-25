<?php

namespace App\Entity;

use App\Entity\Traits\IdTrait;
use App\Repository\CertificationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints\File as FileValid;
use Vich\UploaderBundle\Mapping\Annotation\Uploadable;
use Vich\UploaderBundle\Mapping\Annotation\UploadableField;

#[Uploadable]
#[Entity(repositoryClass: CertificationRepository::class)]
class Certification
{
    use IdTrait;

    #[Column(type: Types::STRING)]
    private string $title;

    #[Column(type: Types::STRING)]
    private string $organization;

    #[Column(type: Types::STRING, nullable: true)]
    private ?string $certificationNumber = null;

    #[Column(type: Types::DATE_IMMUTABLE)]
    private \DateTimeImmutable $startDate;

    #[Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $endDate = null;

    #[Column(type: Types::STRING, nullable: true)]
    private ?string $uploadedFileName = null;

    #[FileValid(maxSize: '1M', mimeTypes: ['application/pdf'])]
    #[UploadableField(mapping: 'certification', fileNameProperty: 'uploadedFileName')]
    private ?File $uploadedFile = null;

    #[Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    public function __construct()
    {
        $this->endDate = new \DateTimeImmutable();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Certification
    {
        $this->title = $title;

        return $this;
    }

    public function getOrganization(): string
    {
        return $this->organization;
    }

    public function setOrganization(string $organization): Certification
    {
        $this->organization = $organization;

        return $this;
    }

    public function getCertificationNumber(): ?string
    {
        return $this->certificationNumber;
    }

    public function setCertificationNumber(?string $certificationNumber): Certification
    {
        $this->certificationNumber = $certificationNumber;

        return $this;
    }

    public function getStartDate(): \DateTimeImmutable
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeImmutable $startDate): Certification
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeImmutable
    {
        return $this->endDate;
    }

    public function setEndDate(?\DateTimeImmutable $endDate): Certification
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getUploadedFileName(): ?string
    {
        return $this->uploadedFileName;
    }

    public function setUploadedFileName(?string $uploadedFileName): Certification
    {
        $this->uploadedFileName = $uploadedFileName;

        return $this;
    }

    public function getUploadedFile(): ?File
    {
        return $this->uploadedFile;
    }

    public function setUploadedFile(?File $uploadedFile): void
    {
        $this->uploadedFile = $uploadedFile;

        if (null !== $uploadedFile) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }
}
