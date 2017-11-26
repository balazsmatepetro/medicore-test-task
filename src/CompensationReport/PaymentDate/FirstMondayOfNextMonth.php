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
    // TODO: Add docBlock!
    const DATE_FORMAT = 'Y-m-d';

    /**
     * The reported month.
     *
     * @var DateTimeInterface
     */
    private $reportMonth;

    /**
     * @param DateTimeInterface $reportMonth The reported month.
     */
    public function __construct(DateTimeInterface $reportMonth)
    {
        $this->reportMonth = $reportMonth;
    }

    /**
     * @inheritDoc
     */
    public function getDate() : DateTimeInterface
    {
        $firstDayOfNextMonth = $this->getFirstDayOfNextMonth();

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
    private function getFirstDayOfNextMonth()
    {
        return DateTimeImmutable::createFromFormat(self::DATE_FORMAT, $this->reportMonth->format(self::DATE_FORMAT))
            ->modify('first day of next month');
    }
}
