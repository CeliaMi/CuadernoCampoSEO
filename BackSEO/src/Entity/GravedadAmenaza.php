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

    #[ORM\Column(length: 255)]
    private ?string $nombreCampoGravedadAmenaza = null;

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

    public function getNombreCampoGravedadAmenaza(): ?string
    {
        return $this->nombreCampoGravedadAmenaza;
    }

    public function setNombreCampoGravedadAmenaza(string $nombreCampoGravedadAmenaza): self
    {
        $this->nombreCampoGravedadAmenaza = $nombreCampoGravedadAmenaza;

        return $this;
    }
}
