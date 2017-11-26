<?php

namespace Medicore\Test\CompensationReport\PaymentDate;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use Medicore\CompensationReport\Contract\ValueObject\ReportItemInterface;
use Medicore\CompensationReport\ValueObject\ReportItem;
use Medicore\Employee\Entity\Employee;
use Medicore\Transport\Bus;

/**
 * Description of ReportItemTest
 * 
 * @author Balázs Máté Petró <petrobalazsmate@gmail.com>
 */
class ReportItemTest extends TestCase
{
    const DATA_COMPENSATION = 100.5;

    const DATA_TRAVELLED_DISTANCE = 200;

    /**
     * @var Employee
     */
    private $employee;

    /**
     * @var DateTimeImmutable
     */
    private $reportDate;

    /**
     * @var ReportItem
     */
    private $reportItem;

    protected function setUp()
    {
        $this->employee = new Employee('John', new Bus, 10);
        $this->reportDate = new DateTimeImmutable('2017-11-26 19:00:00');
        $this->reportItem = new ReportItem(
            $this->employee,
            self::DATA_COMPENSATION,
            self::DATA_TRAVELLED_DISTANCE,
            $this->reportDate
        );
    }

    public function testConstructReturnsProperInstance()
    {
        $this->assertInstanceOf(ReportItemInterface::class, $this->reportItem);
    }

    public function testGetEmployeeReturnsProperValue()
    {
        $this->assertEquals($this->employee->getFirstName(), $this->reportItem->getEmployee());
    }

    public function testGetTransportReturnsProperValue()
    {
        $this->assertEquals($this->employee->getTransport()->getName(), $this->reportItem->getTransport());
    }

    public function testGetCompensationReturnsProperValue()
    {
        $this->assertEquals(self::DATA_COMPENSATION, $this->reportItem->getCompensation());
    }

    public function testGetTravelledDistanceReturnsProperValue()
    {
        $this->assertEquals(self::DATA_TRAVELLED_DISTANCE, $this->reportItem->getTravelledDistance());
    }

    public function testGetPaymentDateReturnsProperValue()
    {
        $this->assertEquals($this->reportDate->format('Y-m-d'), $this->reportItem->getPaymentDate());
    }
}
