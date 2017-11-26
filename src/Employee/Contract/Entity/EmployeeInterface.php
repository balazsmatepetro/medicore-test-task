<?php

declare(strict_types=1);

namespace Medicore\Employee\Contract\Entity;

use Medicore\Transport\Contract\TransportInterface;

/**
 * Description of EmployeeInterface
 *
 * @author Balázs Máté Petró <petrobalazsmate@gmail.com>
 */
interface EmployeeInterface
{
    /**
     * Returns the first name of employee.
     *
     * @return string
     */
    public function getFirstName() : string;

    /**
     * Returns how the employee commutes to work.
     *
     * @return TransportInterface
     */
    public function getTransport() : TransportInterface;

    /**
     * Returns the one way travelled distance.
     *
     * @return int
     */
    public function getOneWayDistance() : int;
}
