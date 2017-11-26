<?php

declare(strict_types=1);

namespace Medicore\CompensationReport\ValueObject;

use DateTimeInterface;
use Medicore\CompensationReport\Contract\ValueObject\ReportItemInterface;
use Medicore\Employee\Contract\Entity\EmployeeInterface;

/**
 * Description of ReportItem
 * 
 * @author Balázs Máté Petró <petrobalazsmate@gmail.com>
 */
final class ReportItem implements ReportItemInterface
{
    /**
     * @var EmployeeInterface
     */
    private $employee;

    /**
     * @var float
     */
    private $compensation;

    /**
     * @var DateTimeInterface
     */
    private $paymentDate;

    /**
     * @var int
     */
    private $travelledDistance;

    /**
     * Creates a new ReportItem instance.
     *
     * @param EmployeeInterface $employee The Employee instance.
     * @param float $compensation The compensation for the employee.
     * @param int $travelledDistance The travelled distance by the employee.
     * @param DateTimeInterface $paymentDate The payment date of compensation.
     */
    public function __construct(
        EmployeeInterface $employee,
        float $compensation,
        int $travelledDistance,
        DateTimeInterface $paymentDate
    ) {
        $this->employee = $employee;
        $this->compensation = $compensation;
        $this->travelledDistance = $travelledDistance;
        $this->paymentDate = $paymentDate;
    }

    /**
     * @inheritDoc
     */
    public function getEmployee() : string
    {
        return $this->employee->getFirstName();
    }

    /**
     * @inheritDoc
     */
    public function getTransport() : string
    {
        return $this->employee->getTransport()->getName();
    }

    /**
     * @inheritDoc
     */
    public function getTravelledDistance() : int
    {
        return $this->travelledDistance;
    }

    /**
     * @inheritDoc
     */
    public function getCompensation() : float
    {
        return $this->compensation;
    }

    /**
     * @inheritDoc
     */
    public function getPaymentDate() : string
    {
        return $this->paymentDate->format('Y-m-d');
    }
}
