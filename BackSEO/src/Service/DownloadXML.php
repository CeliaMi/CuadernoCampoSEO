<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;

#[Route('/download', name: 'app_download_xml')]
class DownloadXMLController extends AbstractController
{
    #[Route('/download', name: 'app_download_xml')]
    public function downloadXml()
    {   
        $file = $this->renderView('app_response_xml');
        return $this->file($file, 'Alertas.xml');  
  }
        
}