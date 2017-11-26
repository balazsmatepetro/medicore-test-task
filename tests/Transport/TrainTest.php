<?php

namespace Medicore\Test\Transport;

use PHPUnit\Framework\TestCase;
use Medicore\Transport\AbstractTransport;
use Medicore\Transport\PublicTransport;
use Medicore\Transport\Train;
use Medicore\Transport\Contract\TransportInterface;

/**
 * Description of TrainTest
 *
 * @author Balázs Máté Petró <petrobalazsmate@gmail.com>
 */
class TrainTest extends TestCase
{
    private $train;

    protected function setUp()
    {
        $this->train = new Train;
    }

    public function testConstructReturnsProperInstance()
    {
        $this->assertInstanceOf(TransportInterface::class, $this->train);
        $this->assertInstanceOf(AbstractTransport::class, $this->train);
        $this->assertInstanceOf(PublicTransport::class, $this->train);
    }

    public function testGetNameReturnsProperName()
    {
        $this->assertEquals(Train::NAME, $this->train->getName());
    }

    public function testGetCompensationReturnsProperValue()
    {
        $value = $this->train->getCompensation();

        $this->assertTrue(is_float($value));
        $this->assertEquals(0.25, $value);
    }

    public function testToStringReturnsTheName()
    {
        $this->assertEquals(Train::NAME, (string)$this->train);
    }
}
