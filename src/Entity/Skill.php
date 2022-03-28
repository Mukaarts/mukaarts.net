<?php

declare(strict_types=1);

namespace App\Entity;

use App\Entity\Traits\IdTrait;
use App\Repository\SkillRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\ManyToMany;

#[Entity(repositoryClass: SkillRepository::class)]
class Skill
{
    use IdTrait;

    #[Column(type: Types::STRING)]
    private string $title;

    #[Column(type: Types::INTEGER)]
    private int $experience;

    /**
     * @var Collection<int, Course>
     */
    #[ManyToMany(targetEntity: Course::class, mappedBy: 'skills')]
    private Collection $courses;

    public function __construct()
    {
        $this->courses = new ArrayCollection();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Skill
    {
        $this->title = $title;

        return $this;
    }

    public function getExperience(): int
    {
        return $this->experience;
    }

    public function setExperience(int $experience): Skill
    {
        $this->experience = $experience;

        return $this;
    }

    /**
     * @return Collection<int, Course>
     */
    public function getCourses(): Collection
    {
        return $this->courses;
    }

    public function __toString(): string
    {
        return $this->title;
    }
}
