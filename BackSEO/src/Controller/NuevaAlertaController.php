<?php

namespace App\Controller;

use App\Entity\Alerta;
use App\Form\AlertaType;
use App\Repository\AlertaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NuevaAlertaController extends AbstractController
{
    #[Route('/new', name: 'app_alerta_new', methods: ['GET', 'POST'])]
    public function new(Request $request, AlertaRepository $alertaRepository): Response
    {
        $alertum = new Alerta();
        $form = $this->createForm(AlertaType::class, $alertum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->addFlash('exito', 'Alerta Recibida');
            $alertaRepository->save($alertum, true);

            return $this->redirectToRoute('app_alerta_new', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('/new.html.twig', [
            'alertum' => $alertum,
            'form' => $form,
        ]);
    }
}