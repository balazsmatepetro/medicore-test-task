<?php

namespace Medicore\Test\Transport;

use PHPUnit\Framework\TestCase;
use Medicore\Transport\AbstractTransport;
use Medicore\Transport\Bike;
use Medicore\Transport\Contract\TransportInterface;

/**
 * Description of BikeTest
 *
 * @author Balázs Máté Petró <petrobalazsmate@gmail.com>
 */
class BikeTest extends TestCase
{
    /**
     * @var Bike
     */
    private $bike;

    protected function setUp()
    {
        $this->bike = new Bike;
    }

    public function testConstructReturnsProperInstance()
    {
        $this->assertInstanceOf(TransportInterface::class, $this->bike);
        $this->assertInstanceOf(AbstractTransport::class, $this->bike);
    }

    public function testGetNameReturnsProperName()
    {
        $this->assertEquals(Bike::NAME, $this->bike->getName());
    }

    public function testGetCompensationReturnsProperValue()
    {
        $value = $this->bike->getCompensation();

        $this->assertTrue(is_float($value));
        $this->assertEquals(0.50, $value);
    }

    public function testToStringReturnsTheName()
    {
        $this->assertEquals(Bike::NAME, (string)$this->bike);
    }
}
