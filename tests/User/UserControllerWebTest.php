<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 09/09/19
 * Time: 09:41
 */


namespace App\Tests\Util;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class UserControllerWebTest extends WebTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    public $entityManager;

    private $repository;

    public function testCreateUser()
    {
        $client = self::createClient();
        $client->request('GET', 'user/create');
        $this->assertTrue($client->getResponse()->isSuccessful());

        $user = $this->repository->findByName('Richard Parker');
        $this->assertEquals($user[0]->getName(), 'Richard Parker');
    }

    protected function setUp()
    {

        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();

        $this->repository = $this->entityManager->getRepository(User::class);

        foreach ($this->repository->findAll() as $user) {
            $this->entityManager->remove($user);
        }

        $this->entityManager->flush();
    }
}
