<?php

namespace App\Entity;

use App\Entity\Traits\IdTrait;
use App\Repository\PositionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;

#[ORM\Entity(repositoryClass: PositionRepository::class)]
class Position
{
    use IdTrait;

    #[ORM\ManyToOne(targetEntity: Career::class, inversedBy: 'positions')]
    private Career $career;

    #[Column(type: Types::STRING, length: 255)]
    private string $title;

    #[Column(type: Types::INTEGER)]
    private ?int $type = null;

    #[Column(type: Types::DATETIME_IMMUTABLE)]
    private \DateTimeImmutable $startDate;

    #[Column(type: Types::DATETIME_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $endDate = null;

    public function __construct()
    {
        $this->startDate = new \DateTimeImmutable();
    }

    public function getCareer(): Career
    {
        return $this->career;
    }

    public function setCareer(Career $career): Position
    {
        $this->career = $career;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Position
    {
        $this->title = $title;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(?int $type): Position
    {
        $this->type = $type;

        return $this;
    }

    public function getStartDate(): \DateTimeImmutable
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeImmutable $startDate): Position
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeImmutable
    {
        return $this->endDate;
    }

    public function setEndDate(?\DateTimeImmutable $endDate): Position
    {
        $this->endDate = $endDate;

        return $this;
    }
}
