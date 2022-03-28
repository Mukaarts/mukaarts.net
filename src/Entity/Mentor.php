<?php

declare(strict_types=1);

namespace App\Entity;

use App\Entity\Traits\IdTrait;
use App\Repository\MentorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\OneToMany;

#[Entity(repositoryClass: MentorRepository::class)]
class Mentor
{
    use IdTrait;

    #[Column(type: Types::STRING)]
    private string $name;

    #[Column(type: Types::STRING, nullable: true)]
    private ?string $link = null;

    /**
     * @var Collection<int, Course>
     */
    #[OneToMany(mappedBy: 'mentor', targetEntity: Course::class)]
    private Collection $courses;

    public function __construct()
    {
        $this->courses = new ArrayCollection();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Mentor
    {
        $this->name = $name;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): Mentor
    {
        $this->link = $link;

        return $this;
    }

    /**
     * @return Collection<int,  Course>
     */
    public function getCourses(): Collection
    {
        return $this->courses;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
