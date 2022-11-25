<?php

// namespace App\test\Controller;

// use App\Entity\Alerta;
// use App\Entity\User;
// use App\Repository\AlertaRepository;
// use App\Repository\UserRepository;
// use Symfony\Bundle\FrameworkBundle\KernelBrowser;
// use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
// use Doctrine\DBAL\Driver\Middleware;
// use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
// use Symfony\Bundle\FrameworkBundle\BrowserKitAssertionsTrait;

// class NewControllerTest extends WebTestCase
// {  
//     private KernelBrowser $client;
//     private AlertaRepository $repository;
//     private string $path = 'http://127.0.0.1:8000/';


//     protected function setUp(): void
//     {
//         // $this->client = static::createClient();
//         // dump($this->client);
//         // die;
//         $this->repository = static::getContainer()->get('doctrine')->getRepository(Alerta::class);

//         foreach ($this->repository->findAll() as $object) {
//             $this->repository->remove($object, true);
//         }
//     }

//     public function testIndex(): void
//     {
//         $crawler = $this->client->request('GET', $this->path);

//         self::assertResponseStatusCodeSame(200);
//         // self::assertPageTitleContains('Alertas');

//         // Use the $crawler to perform additional assertions e.g.
//         // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
//     }
  
//   public function testNew(): void
//     {
//         $originalNumObjectsInRepository = count($this->repository->findAll());

//         $this->markTestIncomplete();
//         $this->client->request('GET', sprintf('%snuevalerta', $this->path));

//         self::assertResponseStatusCodeSame(200);

//         $this->client->submitForm('Save', [
//             'alertum[ubicacion]' => 'Testing',
//             'alertum[foto]' => 'Testing',
//             'alertum[descripcion]' => 'Testing',
//             'alertum[nombreContacto]' => 'Testing',
//             'alertum[emailContacto]' => 'Testing',
//             'alertum[telefonoContacto]' => 'Testing',
//             'alertum[nivelGravedad]' => 'Testing',
//             'alertum[superficieAfectada]' => 'Testing',
//             'alertum[tiempoDesarrollo]' => 'Testing',
//             'alertum[nombreTipoDeAmenaza]' => 'Testing',
//             'alertum[espacioProtegido]' => 'Testing',
//             'alertum[planDeGestion]' => 'Testing',
//             'alertum[actividadesDeConservacion]' => 'Testing',
//             'alertum[organizaciones]' => 'Testing',
//             'alertum[IBA]' => 'Testing',
//             'alertum[observaciones]' => 'Testing',
//         ]);

//         self::assertResponseRedirects('/enviado');

//         self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
//     }
// }