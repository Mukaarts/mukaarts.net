<?php

namespace App\Entity;

use App\Entity\Traits\IdTrait;
use App\Repository\CourseRepository;
use DateTimeImmutable as Date;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\ManyToOne;
use Symfony\Component\Validator\Constraints\Url;

#[Entity(repositoryClass: CourseRepository::class)]
class Course
{
    use IdTrait;

    #[Column(type: Types::STRING)]
    private string $title;

    #[Column(type: Types::STRING, nullable: true)]
    #[Url]
    private ?string $link = null;

    #[Column(type: Types::DATE_IMMUTABLE)]
    private Date $startDate;

    #[Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?Date $endDate = null;

    /**
     * @var Collection<int, Skill>
     */
    #[ManyToMany(targetEntity: Skill::class, inversedBy: 'courses')]
    private Collection $skills;

    #[ManyToOne(targetEntity: Mentor::class, inversedBy: 'course')]
    private ?Mentor $mentor = null;

    public function __construct()
    {
        $this->startDate = new Date();
        $this->skills = new ArrayCollection();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Course
    {
        $this->title = $title;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): Course
    {
        $this->link = $link;

        return $this;
    }

    public function getStartDate(): Date
    {
        return $this->startDate;
    }

    public function setStartDate(Date $startDate): Course
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?Date
    {
        return $this->endDate;
    }

    public function setEndDate(?Date $endDate): Course
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * @return Collection<int, Skill>
     */
    public function getSkills(): Collection
    {
        return $this->skills;
    }

    public function getMentor(): ?Mentor
    {
        return $this->mentor;
    }

    public function setMentor(?Mentor $mentor): Course
    {
        $this->mentor = $mentor;

        return $this;
    }
}
