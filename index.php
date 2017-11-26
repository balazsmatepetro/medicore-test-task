<?php

require 'vendor/autoload.php';

$report = new Medicore\CompensationReport\Report(
    new Medicore\CompensationReport\PaymentDate\FirstMondayOfNextMonth,
    new class implements Medicore\CompensationReport\Contract\WorkingDaysCalculator\WorkingDaysCalculatorInterface {
        public function calculate() : int
        {
            // NOTE: Just take the average...
            return 20;
        }
    },
    new Medicore\CompensationReport\Writer\Csv(
        new League\Flysystem\Filesystem(
            new League\Flysystem\Adapter\Local(__DIR__ . '/var/output')
        )
    )
);

$result = $report->create(
    new DateTimeImmutable('2017-11-01'),
    (new Medicore\Employee\Repository\InMemory)->findAll()
);

echo $result->getPath(), ' is written to the disk!', PHP_EOL;
exit;
