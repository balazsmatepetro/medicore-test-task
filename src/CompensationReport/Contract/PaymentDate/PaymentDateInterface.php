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
     * Returns the payment date.
     *
     * @return DateTimeInterface
     */
    public function getDate() : DateTimeInterface;
}
