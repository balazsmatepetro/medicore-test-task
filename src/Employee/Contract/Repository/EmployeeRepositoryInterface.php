<?php

declare(strict_types=1);

namespace Medicore\Employee\Contract\Repository;

use Medicore\Employee\Contract\Entity\EmployeeInterface;

/**
 * Description of EmployeeRepositoryInterface
 *
 * @author Balázs Máté Petró <petrobalazsmate@gmail.com>
 */
interface EmployeeRepositoryInterface
{
    /**
     * Returns a collection of Employee instances.
     *
     * @return array[EmployeeInterface]
     */
    public function findAll() : array;
}
