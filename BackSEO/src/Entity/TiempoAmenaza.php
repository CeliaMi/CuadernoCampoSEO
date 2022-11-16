<?php

namespace App\Entity;

use App\Repository\TiempoAmenazaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TiempoAmenazaRepository::class)]
class TiempoAmenaza
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $tiempoDesarrollo = null;

    #[ORM\Column(length: 255)]
    private ?string $NombreCampoTiempoDesarrollo = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTiempoDesarrollo(): ?int
    {
        return $this->tiempoDesarrollo;
    }

    public function setTiempoDesarollo(int $tiempoDesarrollo): self
    {
        $this->tiempoDesarrollo = $tiempoDesarrollo;

        return $this;
    }

    public function  __toString() {
        return $this->getNombreCampoTiempoDesarrollo();
    }

    public function getNombreCampoTiempoDesarrollo(): ?string
    {
        return $this->NombreCampoTiempoDesarrollo;
    }

    public function setNombreCampoTiempoDesarrollo(string $NombreCampoTiempoDesarrollo): self
    {
        $this->NombreCampoTiempoDesarrollo = $NombreCampoTiempoDesarrollo;

        return $this;
    }
}
