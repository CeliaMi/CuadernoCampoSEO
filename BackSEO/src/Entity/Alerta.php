<?php

namespace App\Entity;

use App\Repository\AlertaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlertaRepository::class)]
class Alerta
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $ubicacion = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $foto = null;

    #[ORM\Column(length: 500)]
    private ?string $descripcion = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?GravedadAmenaza $nivelgravedad = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?SuperficieAmenaza $superficieAfectada = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?TiempoAmenaza $tiempoDesarrollo = null;
    
    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?TipoDeAmenaza $nombreTipoDeAmenaza = null;

    #[ORM\Column(length: 255)]
    private ?string $nombreContacto = null;

    #[ORM\Column(length: 50)]
    private ?string $emailContacto = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $telefonoContacto = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUbicacion(): ?string
    {
        return $this->ubicacion;
    }

    public function setUbicacion(string $ubicacion): self
    {
        $this->ubicacion = $ubicacion;

        return $this;
    }

    public function getFoto(): ?string
    {
        return $this->foto;
    }

    public function setFoto(?string $foto): self
    {
        $this->foto = $foto;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }


    public function getSuperficieAfectada(): ?SuperficieAmenaza
    {
        return $this->superficieAfectada;
    }

    public function setSuperficieAfectada(?SuperficieAmenaza $superficieAfectada): self
    {
        $this->superficieAfectada= $superficieAfectada;

        return $this;
    }
    
    public function getTiempoDesarrollo(): ?TiempoAmenaza
    {
        return $this->tiempoDesarrollo;
    }

    public function setTiempoDesarrollo(?TiempoAmenaza $tiempoDesarrollo): self
    {
        $this->tiempoDesarrollo= $tiempoDesarrollo;

        return $this;
    }

    public function getNombreTipoDeAmenaza(): ?TipoDeAmenaza
    {
        return $this->nombreTipoDeAmenaza ;
    }

    public function setNombreTipoDeAmenaza(?TipoDeAmenaza $nombreTipoDeAmenaza): self
    {
        $this->nombreTipoDeAmenaza= $nombreTipoDeAmenaza;

        return $this;
    }


    public function getNivelgravedad(): ?GravedadAmenaza
    {
        return $this->nivelgravedad;
    }

    public function setNivelgravedad(?GravedadAmenaza $nivelgravedad): self
    {
        $this->nivelgravedad = $nivelgravedad;

        return $this;
    }


    public function getNombreContacto(): ?string
    {
        return $this->nombreContacto;
    }

    public function setNombreContacto(string $nombreContacto): self
    {
        $this->nombreContacto = $nombreContacto;

        return $this;
    }

    public function getEmailContacto(): ?string
    {
        return $this->emailContacto;
    }

    public function setEmailContacto(string $emailContacto): self
    {
        $this->emailContacto = $emailContacto;

        return $this;
    }

    public function getTelefonoContacto(): ?string
    {
        return $this->telefonoContacto;
    }

    public function setTelefonoContacto(?string $telefonoContacto): self
    {
        $this->telefonoContacto = $telefonoContacto;

        return $this;
    }
   

}