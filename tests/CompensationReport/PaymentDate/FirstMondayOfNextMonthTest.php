<?php

namespace Medicore\Test\CompensationReport\PaymentDate;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use Medicore\CompensationReport\PaymentDate\FirstMondayOfNextMonth;

/**
 * Description of FirstMondayOfNextMonthTest
 * 
 * @author Balázs Máté Petró <petrobalazsmate@gmail.com>
 */
class FirstMondayOfNextMonthTest extends TestCase
{
    /**
     * @dataProvider dataProviderGetDate
     */
    public function testGetDate($reportDate, $expectedDate)
    {
        $this->assertEquals($expectedDate, (new FirstMondayOfNextMonth)->getPaymentDate($reportDate)->format('Y-m-d'));
    }

    public function dataProviderGetDate()
    {
        return [
            [DateTimeImmutable::createFromFormat('Y-m-d', '2017-01-10'), '2017-02-06'],
            [DateTimeImmutable::createFromFormat('Y-m-d', '2017-02-01'), '2017-03-06'],
            [DateTimeImmutable::createFromFormat('Y-m-d', '2017-03-22'), '2017-04-03'],
            [DateTimeImmutable::createFromFormat('Y-m-d', '2017-04-17'), '2017-05-01'],
            [DateTimeImmutable::createFromFormat('Y-m-d', '2017-05-01'), '2017-06-05'],
            [DateTimeImmutable::createFromFormat('Y-m-d', '2017-06-26'), '2017-07-03'],
            [DateTimeImmutable::createFromFormat('Y-m-d', '2017-07-15'), '2017-08-07'],
            [DateTimeImmutable::createFromFormat('Y-m-d', '2017-08-27'), '2017-09-04'],
            [DateTimeImmutable::createFromFormat('Y-m-d', '2017-09-23'), '2017-10-02'],
            [DateTimeImmutable::createFromFormat('Y-m-d', '2017-10-16'), '2017-11-06'],
            [DateTimeImmutable::createFromFormat('Y-m-d', '2017-11-22'), '2017-12-04'],
            [DateTimeImmutable::createFromFormat('Y-m-d', '2017-12-01'), '2018-01-01'],
        ];
    }
}
