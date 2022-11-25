<?php
namespace App\tests\Controller;
 
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Entity\Alerta;
use App\Repository\AlertaRepository;
 
class ProfileControllerTest extends WebTestCase
{
    // ...
 
    public function testVisitingWhileLoggedIn()
    {
        $client = static::createClient();
 
        // obtén o crea el usuario de alguna manera (ej. creando usuarios específicos
        // para tests cuando cargues los "fixtures" o datos de prueba de los tests)
        $userRepository = static::$container->get(UserRepository::class);
        $testUser = $userRepository->findOneByEmail('test@test.com');
 
        $client->loginUser($testUser);
 
        // el usuario ya está logueado, así que pueden testear páginas protegidas
         $client->request('GET', 'http://127.0.0.1:8000/alerta/');
         $this->assertResponseIsSuccessful();
         $this->assertSelectorTextContains('h1', 'Alertas');
    }
}