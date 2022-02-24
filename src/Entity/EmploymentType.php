<?php

namespace App\Entity;

use App\Repository\EmploymentTypeTranslationRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Contract\Entity\TranslatableInterface;
use Knp\DoctrineBehaviors\Contract\Entity\TranslationInterface;
use Knp\DoctrineBehaviors\Model\Translatable\TranslatableTrait;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\PropertyAccess\PropertyPathInterface;

#[ORM\Entity(repositoryClass: EmploymentTypeTranslationRepository::class)]
class EmploymentType implements TranslatableInterface
{
    use TranslatableTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER, nullable: true)]
    private ?int $id = null;

    /**
     * @var Collection<string, TranslationInterface>
     */
    protected $translations;

    /**
     * @param array<string, mixed> $arguments
     */
    public function __call(string|PropertyPathInterface $method, array $arguments = []): mixed
    {
        return PropertyAccess::createPropertyAccessor()->getValue($this->translate(), $method);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCurrentLocaleTitle(): string
    {
        /** @var TranslationInterface $translation */
        $translation = $this->findTranslationByLocale($this->getCurrentLocale());

        /** @var EmploymentTypeTranslation $employeeType */
        $employeeType = $translation->getTranslatable()->getTranslations()->get($this->getCurrentLocale());

        return $employeeType->getTitle();
    }

    public function __toString(): string
    {
        return $this->getCurrentLocaleTitle();
    }
}
