<?php

declare(strict_types=1);

namespace Medicore\Employee\Repository;

use Medicore\Employee\Contract\Repository\EmployeeRepositoryInterface;
use Medicore\Employee\Entity\Employee;
use Medicore\Transport;

/**
 * Description of InMemory
 * 
 * @author Balázs Máté Petró <petrobalazsmate@gmail.com>
 */
final class InMemory implements EmployeeRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function findAll() : array
    {
        return [
            new Employee('Paul', new Transport\Car, 60),
            new Employee('Martin', new Transport\Bus, 8),
            new Employee('Jeroen', new Transport\Bike, 9),
            new Employee('Tineke', new Transport\Bike, 4),
            new Employee('Arnout', new Transport\Train, 23),
            new Employee('Sander', new Transport\Bike, 11)
        ];
    }
}
