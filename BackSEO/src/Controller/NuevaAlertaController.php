<?php

namespace App\Controller;

use App\Entity\Alerta;
use App\Form\AlertaType;
use App\Repository\AlertaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;


class NuevaAlertaController extends AbstractController
{
    #[Route('/nuevalerta', name: 'app_alerta_new', methods: ['GET', 'POST'])]
    public function new(Request $request, AlertaRepository $alertaRepository, SluggerInterface $slugger): Response
    {
        $alertum = new Alerta();
        $form = $this->createForm(AlertaType::class, $alertum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $brochureFile = $form->get('foto')->getData();
            
            if ($brochureFile) {
                $originalFilename = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$brochureFile->guessExtension();

                try {
                    $brochureFile->move(
                        $this->getParameter('foto_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    throw new Exception('Upsi');
                }


                $alertum->setFoto($newFilename);
            }
            $this->addFlash('exito', 'Gracias por ayudarnos a preservar la biodiversidad.');
            $alertaRepository->save($alertum, true);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($alertum);
            $em->flush();



            return $this->redirectToRoute('app_enviado', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('/new.html.twig', [
            'alertum' => $alertum,
            'form' => $form,
        ]);
    }
}