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

class ResponseJsonController extends AbstractController
{
    #[Route('/response/json', name: 'app_response_json',methods: ['GET',"POST"])]
    public function responseJson(Request $request, AlertaRepository $alertaRepository): Response
    {    
        $amenaza = $this->getDoctrine()
        ->getRepository(Alerta::class)
        ->findAll();
        $data = [];
        foreach ($amenaza as $p) {
            $data[] = [
                'id' => $p->getId(),
                'TipoAlerta' => $p->getTipoAmenaza(),
                'Descripcion'=> $p ->getDescripcion(),
            ];
        }
        return $this->json($data);
        
    }
}