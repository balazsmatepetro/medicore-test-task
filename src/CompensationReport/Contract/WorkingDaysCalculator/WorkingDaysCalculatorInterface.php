<?php

declare(strict_types=1);

namespace Medicore\CompensationReport\Contract\WorkingDaysCalculator;

use DateTimeInterface;

/**
 * Description of WorkingDaysCalculatorInterface
 *
 * @author Balázs Máté Petró <petrobalazsmate@gmail.com>
 */
interface WorkingDaysCalculatorInterface
{
    /**
     * Returns the number of working days.
     *
     * @return int
     */
    public function calculate() : int;
}
