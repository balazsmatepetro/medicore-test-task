<?php

namespace Medicore\Test\Transport;

use PHPUnit\Framework\TestCase;
use Medicore\Transport\AbstractTransport;
use Medicore\Transport\Car;
use Medicore\Transport\Contract\TransportInterface;

/**
 * Description of CarTest
 * 
 * @author Balázs Máté Petró <petrobalazsmate@gmail.com>
 */
class CarTest extends TestCase
{
    private $car;

    protected function setUp()
    {
        $this->car = new Car;
    }

    public function testConstructReturnsProperInstance()
    {
        $this->assertInstanceOf(TransportInterface::class, $this->car);
        $this->assertInstanceOf(AbstractTransport::class, $this->car);
    }

    public function testGetNameReturnsProperName()
    {
        $this->assertEquals(Car::NAME, $this->car->getName());
    }

    public function testGetCompensationReturnsProperValue()
    {
        $value = $this->car->getCompensation();

        $this->assertTrue(is_float($value));
        $this->assertEquals(0.10, $value);
    }

    public function testToStringReturnsTheName()
    {
        $this->assertEquals(Car::NAME, (string)$this->car);
    }
}
