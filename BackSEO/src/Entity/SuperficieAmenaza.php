<?php

namespace App\Entity;

use App\Repository\SuperficieAmenazaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SuperficieAmenazaRepository::class)]
class SuperficieAmenaza
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $superficieAfectada = null;

    #[ORM\Column(length: 255)]
    private ?string $NombreCampoSuperficieAfectada = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSuperficieAfectada(): ?int
    {
        return $this->superficieAfectada;
    }

    public function setSuperficieAfectada(int $superficieAfectada): self
    {
        $this->superficieAfectada = $superficieAfectada;

        return $this;
    }

    public function __toString() {
        return $this->getNombreCampoSuperficieAfectada();
    }

    public function getNombreCampoSuperficieAfectada(): ?string
    {
        return $this->NombreCampoSuperficieAfectada;
    }

    public function setNombreCampoSuperficieAfectada(string $NombreCampoSuperficieAfectada): self
    {
        $this->NombreCampoSuperficieAfectada = $NombreCampoSuperficieAfectada;

        return $this;
    }
    
}
