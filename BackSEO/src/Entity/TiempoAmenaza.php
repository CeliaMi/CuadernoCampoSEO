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
    private ?int $tiempoDesarollo = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTiempoDesarollo(): ?int
    {
        return $this->tiempoDesarollo;
    }

    public function setTiempoDesarollo(int $tiempoDesarollo): self
    {
        $this->tiempoDesarollo = $tiempoDesarollo;

        return $this;
    }
}
