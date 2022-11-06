<?php

namespace App\Entity;

use App\Repository\TipoDeAmenazaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TipoDeAmenazaRepository::class)]
class TipoDeAmenaza
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $nombreTipoDeAmenaza = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreTipoDeAmenaza(): ?int
    {
        return $this->nombreTipoDeAmenaza;
    }

    public function setNombreTipoDeAmenaza(int $nombreTipoDeAmenaza): self
    {
        $this->nombreTipoDeAmenaza = $nombreTipoDeAmenaza;

        return $this;
    }

    public function  __toString() {
        return $this-> getNombreTipoDeAmenaza();
    }
    
}
