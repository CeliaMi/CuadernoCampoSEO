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
    private ?string $nombreTipoDeAmenaza = null;

    #[ORM\Column(length: 255)]
    private ?int $valorTipoDeAmenaza = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreTipoDeAmenaza(): ?string
    {
        return $this->nombreTipoDeAmenaza;
    }

    public function setNombreTipoDeAmenaza(string $nombreTipoDeAmenaza): self
    {
        $this->nombreTipoDeAmenaza = $nombreTipoDeAmenaza;

        return $this;
    }

    public function  __toString() {
        return $this-> getNombreTipoDeAmenaza();
            // $this-> getValorTipoDeAmenaza();
    }
    
    public function getValorTipoDeAmenaza(): ?int
    {
        return $this->valorTipoDeAmenaza;
    }

    public function setValorTipoDeAmenaza(int $valorTipoDeAmenaza): self
    {
        $this->valorTipoDeAmenaza = $valorTipoDeAmenaza;

        return $this;
    }

}
