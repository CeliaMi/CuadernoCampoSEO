<?php

namespace App\Entity;

use App\Repository\AlertaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlertaRepository::class)]
class Alerta
{   const TIPOAMENAZA = [
        'Expansión agrícola e intensificación' => '1',
        'Desarrollo residencial y comercial'=> '2',
        'Producción energética y minería'=> '3',
        'Infraestructuras lineales: carreteras, trenes, tendidos eléctricos,…'=> '4',
        'Sobreexplotación, persecución y control de especies'=> '5',
        'Molestias humanas y perturbación'=> '6',
        'Modificación de sistemas naturales: incendios, canales, embalses,…'=> '7',
        'Especies invasoras'=> '8',
        'Contaminación'=> '9',
        'Eventos geológicos: terremotos, erupciones, tsunamis,…'=> '10',
        'Cambio climático'=> '11'
    ];

    
    const SEVERIDAD = [
        'muy poco' => '0',
        'poco'=> '1',
        'Moderado'=> '2',
        'Alto'=> '3',
    ];

    const SUPERFICIE = [
        'Muy poco (<10%)' => '0',
        'Poco (10-50%)'=> '1',
        'Moderada (50-90%)'=> '2',
        'Alto (>90%)'=> '3',
    ];

    const TIEMPO = [
        'Ocurrió en el pasado' => '0',
        'Ocurrirá en más de 4 años' => '1',
        'Ocurrirá en menos de 4 años'=> '2',
        'Ocurre en la actualidad'=> '3',
    ];

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

    #[ORM\Column(length: 255)]
    private ?string $nombreContacto = null;

    #[ORM\Column(length: 50)]
    private ?string $emailContacto = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $telefonoContacto = null;

    #[ORM\Column(length: 255)]
    private ?string $espacioProtegido = null;

    #[ORM\Column(length: 255)]
    private ?string $planDeGestion = null;

    #[ORM\Column(length: 255)]
    private ?string $actividadesDeConservacion = null;

    #[ORM\Column(length: 255)]
    private ?string $organizaciones = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $observaciones = null;

    #[ORM\Column(length: 255)]
    private ?string $IBA = null;

    #[ORM\Column]
    private ?int $severidadAmenaza = null;

    #[ORM\Column]
    private ?int $superficieAfectada = null;

    #[ORM\Column]
    private ?int $tiempoDesarrollo = null;

    #[ORM\Column]
    private ?int $tipoAmenaza = null;

    // #[ORM\Column]
    // private ?int $sumatorio = null;

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

    public function getEspacioProtegido(): ?string
    {
        return $this->espacioProtegido;
    }

    public function setEspacioProtegido(string $espacioProtegido): self
    {
        $this->espacioProtegido = $espacioProtegido;

        return $this;
    }

    public function getPlanDeGestion(): ?string
    {
        return $this->planDeGestion;
    }

    public function setPlanDeGestion(string $planDeGestion): self
    {
        $this->planDeGestion = $planDeGestion;

        return $this;
    }

    public function getActividadesDeConservacion(): ?string
    {
        return $this->actividadesDeConservacion;
    }

    public function setActividadesDeConservacion(string $actividadesDeConservacion): self
    {
        $this->actividadesDeConservacion = $actividadesDeConservacion;

        return $this;
    }

    public function getOrganizaciones(): ?string
    {
        return $this->organizaciones;
    }

    public function setOrganizaciones(string $organizaciones): self
    {
        $this->organizaciones = $organizaciones;

        return $this;
    }

    public function getObservaciones(): ?string
    {
        return $this->observaciones;
    }

    public function setObservaciones(?string $observaciones): self
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    public function getIBA(): ?string
    {
        return $this->IBA;
    }

    public function setIBA(string $IBA): self
    {
        $this->IBA = $IBA;

        return $this;
    }

    public function getSeveridadAmenaza(): ?int
    {
        return $this->severidadAmenaza;
    }

    public function setSeveridadAmenaza(int $severidadAmenaza): self
    {
        $this->severidadAmenaza = $severidadAmenaza;

        return $this;
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

    public function getTiempoDesarrollo(): ?int
    {
        return $this->tiempoDesarrollo;
    }

    public function setTiempoDesarrollo(int $tiempoDesarrollo): self
    {
        $this->tiempoDesarrollo = $tiempoDesarrollo;

        return $this;
    }

    public function getTipoAmenaza(): ?int
    {
        return $this->tipoAmenaza;
    }

    public function setTipoAmenaza(int $tipoAmenaza): self
    {
        $this->tipoAmenaza = $tipoAmenaza;

        return $this;
    }
   
    // public function getSumatorio(): ?int
    // {
    //     return $this->sumatorio;
    // }

    // public function setSumatorio(): self
    // {
    //     $this->$sumatorio = $tipoAmenaza+$tiempoDesarrollo+$superficieAfectada;

    //     return $this;
    // }

}
