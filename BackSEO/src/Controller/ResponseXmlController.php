<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\AlertaRepository;
use App\Entity\Alerta;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
// use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
// use Symfony\Component\Filesystem\Filesystem;
// use Symfony\Component\Filesystem\Path;

class ResponseXmlController extends AbstractController
{
    #[Route('/response/xml', name: 'app_response_xml',methods: ['GET',"POST"])]
    public function responseXml(Request $request, AlertaRepository $alertaRepository): Response
    {   
        //creo un array con los datos
        $amenaza = $this->getDoctrine()
        ->getRepository(Alerta::class)
        ->findAll();
        $data = [];
        foreach ($amenaza as $p) {
            $data[] = [
                'id' => $p->getId(),
                'TipoAlerta' => $p->getTipoAmenaza(),
                'Descripcion'=> $p->getDescripcion(),
                'Ubicación' => $p->getUbicacion(),
                'Tiempo de Desarrollo' => $p->getTiempoDesarrollo(),
                'Superficie afectada' => $p->getSuperficieAfectada(),
                'Gravedad' => $p->getSeveridadAmenaza(),
                'Nombre' => $p->getNombreContacto(),
                'Email' => $p->getEmailContacto(),

            ];
        }
        //Convierto el Array a formato XML
        $xmlEncoder = new XmlEncoder();

        $response = new Response();
        $response->setContent($xmlEncoder->encode($data, 'xml'));
        $response->headers->set('Content-Type', 'xml');
        return $response;
  }
        
}
