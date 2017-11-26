<?php

declare(strict_types=1);

namespace Medicore\CompensationReport;

use DateTimeInterface;
use InvalidArgumentException;
use Medicore\CompensationReport\Contract\PaymentDate\PaymentDateInterface;
use Medicore\CompensationReport\Contract\WorkingDaysCalculator\WorkingDaysCalculatorInterface;
use Medicore\CompensationReport\Contract\Writer\WriterInterface;
use Medicore\CompensationReport\ValueObject\ReportItem;
use Medicore\Employee\Contract\Entity\EmployeeInterface;

/**
 * Description of Report
 *
 * @author Balázs Máté Petró <petrobalazsmate@gmail.com>
 */
final class Report
{
    /**
     * @var PaymentDateInterface
     */
    private $paymentDate;

    /**
     * @var WorkingDaysCalculatorInterface
     */
    private $workingDaysCalculator;

    /**
     * @var WriterInterface
     */
    private $writer;

    public function __construct(
        PaymentDateInterface $paymentDate,
        WorkingDaysCalculatorInterface $workingDaysCalculator,
        WriterInterface $writer
    ) {
        $this->paymentDate = $paymentDate;
        $this->workingDaysCalculator = $workingDaysCalculator;
        $this->writer = $writer;
    }

    public function create(DateTimeInterface $reportDate, array $employees)
    {
        $this->validateEmployees($employees);

        $reportItems = [];

        $paymentDate = $this->paymentDate->getPaymentDate($reportDate);

        foreach ($employees as $employee) {
            $reportItems[] = $this->createReportItem($employee, $paymentDate);
        }

        return $this->writer->write($reportItems);
    }

    /**
     * Creates the report item by the given arguments.
     *
     * @param EmployeeInterface $employee The employee data.
     * @param DateTimeInterface $paymentDate The payment date.
     * @return ReportItem The created report item.
     */
    private function createReportItem(EmployeeInterface $employee, DateTimeInterface $paymentDate) : ReportItem
    {
        $oneWayDistance = $employee->getOneWayDistance(); 
        // NOTE: You're a super cool company so I think you also pay compensation for getting home. ;)
        $dailyDistance = $oneWayDistance * 2;
        $dailyCompensation = $dailyDistance * $employee->getTransport()->getCompensation();

        $workingDays = $this->workingDaysCalculator->calculate();

        return new ReportItem(
            $employee,
            $dailyCompensation * $workingDays,
            $dailyDistance * $workingDays,
            $paymentDate
        );
    }

    /**
     * Validates the given employee items.
     *
     * @param array[EmployeeInterface] $employees The employee items to check.
     * @throws InvalidArgumentException Thrown when one of the employee items is invalid.
     */
    private function validateEmployees(array $employees)
    {
        foreach ($employees as $employee) {
            if (!is_object($employee) || !($employee instanceof EmployeeInterface)) {
                throw new InvalidArgumentException('All items must be instance of ' . EmployeeInterface::class);
            }
        }
    }
}
