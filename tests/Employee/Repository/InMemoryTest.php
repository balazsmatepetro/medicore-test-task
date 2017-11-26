<?php

namespace Medicore\Test\Employee\Repository;

use PHPUnit\Framework\TestCase;
use Medicore\Employee\Contract\Entity\EmployeeInterface;
use Medicore\Employee\Repository\InMemory;
use Medicore\Transport;

/**
 * Description of InMemoryTest
 * 
 * @author Balázs Máté Petró <petrobalazsmate@gmail.com>
 */
class InMemoryTest extends TestCase
{
    /**
     * @var InMemory
     */
    private $repository;

    protected function setUp()
    {
        $this->repository = new InMemory;
    }

    public function testFindAll()
    {
        $result = $this->repository->findAll();

        $this->assertTrue(is_array($result));
        $this->assertCount(6, $result);

        foreach ($result as $item) {
            $this->assertInstanceOf(EmployeeInterface::class, $item);
        }

        $this->assertEquals('Paul', $result[0]->getLastName());
        $this->assertInstanceOf(Transport\Car::class, $result[0]->getTransport());
        $this->assertEquals(60, $result[0]->getOneWayDistance());

        $this->assertEquals('Martin', $result[1]->getLastName());
        $this->assertInstanceOf(Transport\Bus::class, $result[1]->getTransport());
        $this->assertEquals(8, $result[1]->getOneWayDistance());

        $this->assertEquals('Jeroen', $result[2]->getLastName());
        $this->assertInstanceOf(Transport\Bike::class, $result[2]->getTransport());
        $this->assertEquals(9, $result[2]->getOneWayDistance());

        $this->assertEquals('Tineke', $result[3]->getLastName());
        $this->assertInstanceOf(Transport\Bike::class, $result[3]->getTransport());
        $this->assertEquals(4, $result[3]->getOneWayDistance());

        $this->assertEquals('Arnout', $result[4]->getLastName());
        $this->assertInstanceOf(Transport\Train::class, $result[4]->getTransport());
        $this->assertEquals(23, $result[4]->getOneWayDistance());

        $this->assertEquals('Sander', $result[5]->getLastName());
        $this->assertInstanceOf(Transport\Bike::class, $result[5]->getTransport());
        $this->assertEquals(11, $result[5]->getOneWayDistance());
    }
}
