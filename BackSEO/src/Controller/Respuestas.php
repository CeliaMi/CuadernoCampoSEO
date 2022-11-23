<?php

namespace App\Controller;

use App\Repository\AlertaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlertaRepository::class)]
class Respuestas
{  
     const TIPOAMENAZA = [
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


    const RESPUESATIPO = [
        'Si'=> 'Si',
        'No'=> 'No',
        'No sabe, no contesta'=> 'No sabe, no contesta',
    ];

}
    