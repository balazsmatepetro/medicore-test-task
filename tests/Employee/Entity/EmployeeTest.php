<?php

namespace Medicore\Test\Employee\Entity;

use PHPUnit\Framework\TestCase;
use Assert\InvalidArgumentException;
use Medicore\Employee\Entity\Employee;
use Medicore\Transport\Bike;
use Medicore\Transport\Contract\TransportInterface;

/**
 * Description of EmployeeTest
 * 
 * @author Balázs Máté Petró <petrobalazsmate@gmail.com>
 */
class EmployeeTest extends TestCase
{
    const DATA_LAST_NAME = 'John';

    const DATA_ONE_WAY_DISTANCE = 10;

    /**
     * @var Employee
     */
    private $employee;

    protected function setUp()
    {
        $this->employee = new Employee(self::DATA_LAST_NAME, new Bike, self::DATA_ONE_WAY_DISTANCE);
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage The last name cannot be an empty string!
     * @dataProvider dataProviderBlankLastName
     */
    public function testConstructShouldThrowExceptionWhenTheLastNameIsABlankString($lastName)
    {
        new Employee($lastName, new Bike, 0);
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage The one way distance cannot be less than 1!
     * @dataProvider dataProviderOneWayDistance
     */
    public function testConstructShouldThrowExceptionWhenTheOneWayDistanceIsLessThanOne($oneWayDistance)
    {
        new Employee(self::DATA_LAST_NAME, new Bike, $oneWayDistance);
    }

    public function testGetLastNameReturnsProperValue()
    {
        $this->assertEquals(self::DATA_LAST_NAME, $this->employee->getLastName());
    }

    public function testGetTransportReturnsProperValue()
    {
        $transport = $this->employee->getTransport();

        $this->assertInstanceOf(TransportInterface::class, $transport);
        $this->assertInstanceOf(Bike::class, $transport);
    }

    public function testGetOneWayDistanceReturnsProperValue()
    {
        $this->assertEquals(self::DATA_ONE_WAY_DISTANCE, $this->employee->getOneWayDistance());
    }

    public function dataProviderBlankLastName()
    {
        return [
            [''],
            ['    ']
        ];
    }

    public function dataProviderOneWayDistance()
    {
        return [
            [-1],
            [0]
        ];
    }
}
