<?php

namespace App\Entity\Traits;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

trait IdTrait
{
    #[Id]
    #[GeneratedValue]
    #[Column(type: Types::INTEGER)]
    protected ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}
