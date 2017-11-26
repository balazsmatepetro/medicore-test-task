<?php

namespace Medicore\Test\Transport;

use PHPUnit\Framework\TestCase;
use Medicore\Transport\AbstractTransport;
use Medicore\Transport\Bus;
use Medicore\Transport\PublicTransport;
use Medicore\Transport\Contract\TransportInterface;

/**
 * Description of BusTest
 *
 * @author Balázs Máté Petró <petrobalazsmate@gmail.com>
 */
class BusTest extends TestCase
{
    private $bus;

    protected function setUp()
    {
        $this->bus = new Bus;
    }

    public function testConstructReturnsProperInstance()
    {
        $this->assertInstanceOf(TransportInterface::class, $this->bus);
        $this->assertInstanceOf(AbstractTransport::class, $this->bus);
        $this->assertInstanceOf(PublicTransport::class, $this->bus);
    }

    public function testGetNameReturnsProperName()
    {
        $this->assertEquals(Bus::NAME, $this->bus->getName());
    }

    public function testGetCompensationReturnsProperValue()
    {
        $value = $this->bus->getCompensation();

        $this->assertTrue(is_float($value));
        $this->assertEquals(0.25, $value);
    }

    public function testToStringReturnsTheName()
    {
        $this->assertEquals(Bus::NAME, (string)$this->bus);
    }
}
