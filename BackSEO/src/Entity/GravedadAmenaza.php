<?php

namespace App\Entity;

use App\Repository\GravedadAmenazaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GravedadAmenazaRepository::class)]
class GravedadAmenaza
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $nivelgravedad = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNivelgravedad(): ?int
    {
        return $this->nivelgravedad;
    }

    public function setNivelgravedad(int $nivelgravedad): self
    {
        $this->nivelgravedad = $nivelgravedad;

        return $this;
    }

    public function  __toString() {
        return $this->getNivelgravedad();
    }
}
