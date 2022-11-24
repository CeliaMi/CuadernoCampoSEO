<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\AlertaRepository;
use App\Entity\Alerta;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class RespuestaDocumentoXMLController extends AbstractController
{
    #[Route('/respuesta/documentoxml', name: 'app_respuesta_documento_x_m_l')]
    public function responseDocumentXml(Request $request, AlertaRepository $alertaRepository): Response
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
            $file = new UploadedFile($response);
            
    
                    // // nombre para su archivo con extensión
                    // $filename = 'Alerta.xml';
            
                    
                    // $fileContent = $response;
                    
                    
                    // $respuesta= new Response($fileContent);
            
                    // // aquí me pone los headers
                    // $disposition = $respuesta->headers->makeDisposition(
                    //     ResponseHeaderBag::DISPOSITION_ATTACHMENT,
                    //     $filename
                    // );
            
                    // // Establecer la disposición del contenido
                    // $respuesta->headers->set('Content-Disposition', $disposition);
            
                   
                   
             return $file;

    }
}
