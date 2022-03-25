<?php

declare(strict_types=1);

namespace App\Entity;

use App\Entity\Traits\IdTrait;
use App\Repository\EducationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;

#[Entity(repositoryClass: EducationRepository::class)]
class Education
{
    use IdTrait;

    #[Column(type: Types::STRING)]
    private string $school;

    #[Column(type: Types::STRING, nullable: true)]
    private ?string $field = null;

    #[Column(type: Types::DATE_IMMUTABLE)]
    private \DateTimeImmutable $startDate;

    #[Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $endDate = null;

    public function __construct()
    {
        $this->startDate = new \DateTimeImmutable();
    }

    public function getSchool(): string
    {
        return $this->school;
    }

    public function setSchool(string $school): Education
    {
        $this->school = $school;

        return $this;
    }

    public function getField(): ?string
    {
        return $this->field;
    }

    public function setField(string $field): Education
    {
        $this->field = $field;

        return $this;
    }

    public function getStartDate(): \DateTimeImmutable
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeImmutable $startDate): Education
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeImmutable
    {
        return $this->endDate;
    }

    public function setEndDate(?\DateTimeImmutable $endDate): Education
    {
        $this->endDate = $endDate;

        return $this;
    }
}
