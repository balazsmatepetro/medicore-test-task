<?php

declare(strict_types=1);

namespace Medicore\CompensationReport\Contract\ValueObject;

use DateTimeInterface;

/**
 * Description of ReportItemInterface
 * 
 * @author Balázs Máté Petró <petrobalazsmate@gmail.com>
 */
interface ReportItemInterface
{
    /**
     * Returns the name of emplyee.
     *
     * @return string
     */
    public function getEmployee() : string;

    /**
     * Returns the name of transportation.
     *
     * @return string
     */
    public function getTransport() : string;

    /**
     * Returns the travelled distance.
     *
     * @return int
     */
    public function getTravelledDistance() : int;

    /**
     * Returns the compensation.
     *
     * @return float
     */
    public function getCompensation() : float;

    /**
     * Returns the payment date.
     *
     * @return string
     */
    public function getPaymentDate() : string;
}
