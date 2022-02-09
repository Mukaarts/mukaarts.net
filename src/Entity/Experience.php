<?php

namespace App\Entity;

use App\Repository\ExperienceRepository;
use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;

#[ORM\Entity(repositoryClass: ExperienceRepository::class)]
class Experience
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER, nullable: true)]
    private ?int $id = null;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: false)]
    private string $title;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $company = null;

    #[ORM\Column(type: Types::STRING, length: 255, nullable: true)]
    private ?string $location = null;

    #[Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?DateTimeImmutable $startDate = null;

    #[Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?DateTimeImmutable $endDate = null;

    #[ORM\ManyToOne(targetEntity: EmploymentType::class, cascade: ['persist'])]
    private EmploymentType $employmentType;

    public function getEmploymentType(): EmploymentType
    {
        return $this->employmentType;
    }

    public function setEmploymentType(EmploymentType $employmentType): Experience
    {
        $this->employmentType = $employmentType;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Experience
    {
        $this->title = $title;

        return $this;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(?string $company): Experience
    {
        $this->company = $company;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): Experience
    {
        $this->location = $location;

        return $this;
    }

    public function getStartDate(): ?DateTimeImmutable
    {
        return $this->startDate;
    }

    public function setStartDate(?DateTimeImmutable $startDate): Experience
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?DateTimeImmutable
    {
        return $this->endDate;
    }

    public function setEndDate(?DateTimeImmutable $endDate): Experience
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
