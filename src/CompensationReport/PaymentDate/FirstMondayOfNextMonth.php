<?php

declare(strict_types=1);

namespace Medicore\CompensationReport\PaymentDate;

use DateTimeInterface;
use DateTimeImmutable;
use Medicore\CompensationReport\Contract\PaymentDate\PaymentDateInterface;

/**
 * Description of FirstMondayOfNextMonth
 * 
 * @author Balázs Máté Petró <petrobalazsmate@gmail.com>
 */
final class FirstMondayOfNextMonth implements PaymentDateInterface
{
    /**
     * The used date format.
     *
     * @var string
     */
    const DATE_FORMAT = 'Y-m-d';

    /**
     * @inheritDoc
     */
    public function getPaymentDate(DateTimeInterface $reportDate) : DateTimeInterface
    {
        $firstDayOfNextMonth = $this->getFirstDayOfNextMonth($reportDate);

        if (1 === (int)$firstDayOfNextMonth->format('N')) {
            return $firstDayOfNextMonth;
        }

        return $firstDayOfNextMonth->modify('first monday');
    }

    /**
     * Returns the first day of next month.
     *
     * @return DateTimeImmutable
     */
    private function getFirstDayOfNextMonth(DateTimeInterface $reportDate) : DateTimeImmutable
    {
        return DateTimeImmutable::createFromFormat(self::DATE_FORMAT, $reportDate->format(self::DATE_FORMAT))
            ->modify('first day of next month');
    }
}
