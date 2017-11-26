<?php

declare(strict_types=1);

namespace Medicore\CompensationReport\Contract\PaymentDate;

use DateTimeInterface;

/**
 * Description of PaymentDateInterface
 * 
 * @author Balázs Máté Petró <petrobalazsmate@gmail.com>
 */
interface PaymentDateInterface
{
    /**
     * Calculates and returns the payment date by the date of reporting.
     *
     * @param DateTimeInterface $reportDate The date of reporting.
     * @return DateTimeInterface The date of payment.
     */
    public function getPaymentDate(DateTimeInterface $reportDate) : DateTimeInterface;
}
