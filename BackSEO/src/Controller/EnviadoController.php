<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EnviadoController extends AbstractController
{
    #[Route('/enviado', name: 'app_enviado')]
    public function index(): Response
    {
        return $this->render('enviado/index.html.twig', [
            'controller_name' => 'EnviadoController',
        ]);
    }
}
