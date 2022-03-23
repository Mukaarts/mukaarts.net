<?php

namespace App\Entity;

use App\Entity\Traits\IdTrait;
use App\Repository\CareerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;

#[ORM\Entity(repositoryClass: CareerRepository::class)]
class Career
{
    use IdTrait;

    #[Column(type: Types::STRING, length: 255)]
    private string $company;

    #[Column(type: Types::DATETIME_IMMUTABLE)]
    private \DateTimeImmutable $startDate;

    #[Column(type: Types::DATETIME_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $endDate = null;

    /**
     * @var Collection<int, Position>
     */
    #[ORM\OneToMany(mappedBy: 'career', targetEntity: Position::class, orphanRemoval: true)]
    private Collection $positions;

    public function __construct()
    {
        $this->startDate = new \DateTimeImmutable();
        $this->positions = new ArrayCollection();
    }

    public function getCompany(): string
    {
        return $this->company;
    }

    public function setCompany(string $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getStartDate(): \DateTimeImmutable
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeImmutable $startDate): Career
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeImmutable
    {
        return $this->endDate;
    }

    public function setEndDate(?\DateTimeImmutable $endDate): Career
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * @return Collection<int, Position>
     */
    public function getPositions(): Collection
    {
        return $this->positions;
    }
}
