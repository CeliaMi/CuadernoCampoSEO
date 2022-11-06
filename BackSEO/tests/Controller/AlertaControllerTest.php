<?php

namespace App\Test\Controller;

use App\Entity\Alerta;
use App\Repository\AlertaRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AlertaControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private AlertaRepository $repository;
    private string $path = '/alerta/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Alerta::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Alertum index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'alertum[ubicacion]' => 'Testing',
            'alertum[foto]' => 'Testing',
            'alertum[descripcion]' => 'Testing',
            'alertum[nombreContacto]' => 'Testing',
            'alertum[emailContacto]' => 'Testing',
            'alertum[telefonoContacto]' => 'Testing',
            'alertum[nivelGravedad]' => 'Testing',
            'alertum[superficieAfectada]' => 'Testing',
            'alertum[tiempoDesarrollo]' => 'Testing',
            'alertum[nombreTipoDeAmenaza]' => 'Testing',
        ]);

        self::assertResponseRedirects('/alerta/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Alerta();
        $fixture->setUbicacion('My Title');
        $fixture->setFoto('My Title');
        $fixture->setDescripcion('My Title');
        $fixture->setNombreContacto('My Title');
        $fixture->setEmailContacto('My Title');
        $fixture->setTelefonoContacto('My Title');
        $fixture->setNivelGravedad('My Title');
        $fixture->setSuperficieAfectada('My Title');
        $fixture->setTiempoDesarrollo('My Title');
        $fixture->setNombreTipoDeAmenaza('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Alertum');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Alerta();
        $fixture->setUbicacion('My Title');
        $fixture->setFoto('My Title');
        $fixture->setDescripcion('My Title');
        $fixture->setNombreContacto('My Title');
        $fixture->setEmailContacto('My Title');
        $fixture->setTelefonoContacto('My Title');
        $fixture->setNivelGravedad('My Title');
        $fixture->setSuperficieAfectada('My Title');
        $fixture->setTiempoDesarrollo('My Title');
        $fixture->setNombreTipoDeAmenaza('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'alertum[ubicacion]' => 'Something New',
            'alertum[foto]' => 'Something New',
            'alertum[descripcion]' => 'Something New',
            'alertum[nombreContacto]' => 'Something New',
            'alertum[emailContacto]' => 'Something New',
            'alertum[telefonoContacto]' => 'Something New',
            'alertum[nivelGravedad]' => 'Something New',
            'alertum[superficieAfectada]' => 'Something New',
            'alertum[tiempoDesarrollo]' => 'Something New',
            'alertum[nombreTipoDeAmenaza]' => 'Something New',
        ]);

        self::assertResponseRedirects('/alerta/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getUbicacion());
        self::assertSame('Something New', $fixture[0]->getFoto());
        self::assertSame('Something New', $fixture[0]->getDescripcion());
        self::assertSame('Something New', $fixture[0]->getNombreContacto());
        self::assertSame('Something New', $fixture[0]->getEmailContacto());
        self::assertSame('Something New', $fixture[0]->getTelefonoContacto());
        self::assertSame('Something New', $fixture[0]->getNivelGravedad());
        self::assertSame('Something New', $fixture[0]->getSuperficieAfectada());
        self::assertSame('Something New', $fixture[0]->getTiempoDesarrollo());
        self::assertSame('Something New', $fixture[0]->getNombreTipoDeAmenaza());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Alerta();
        $fixture->setUbicacion('My Title');
        $fixture->setFoto('My Title');
        $fixture->setDescripcion('My Title');
        $fixture->setNombreContacto('My Title');
        $fixture->setEmailContacto('My Title');
        $fixture->setTelefonoContacto('My Title');
        $fixture->setNivelGravedad('My Title');
        $fixture->setSuperficieAfectada('My Title');
        $fixture->setTiempoDesarrollo('My Title');
        $fixture->setNombreTipoDeAmenaza('My Title');

        $this->repository->add($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/alerta/');
    }
}
