<?php

declare(strict_types=1);

namespace Medicore\Employee\Entity;

use InvalidArgumentException;
use Assert\Assertion;
use Medicore\Employee\Contract\Entity\EmployeeInterface;
use Medicore\Transport\Contract\TransportInterface;

/**
 * Description of Employee
 * 
 * @author Balázs Máté Petró <petrobalazsmate@gmail.com>
 */
final class Employee implements EmployeeInterface
{
    /**
     * The last name of employee.
     *
     * @var string
     */
    private $lastName;

    /**
     * How the employee commutes to work.
     *
     * @var TransportInterface
     */
    private $transport;

    /**
     * The one way travelled distance.
     *
     * @var int
     */
    private $oneWayDistance;

    /**
     * Creates a new Employee instance.
     *
     * @param string $lastName The last name of employee.
     * @param TransportInterface $transport How the employee commutes to work.
     * @param int $oneWayDistance The one way travelled distance.
     */
    public function __construct(string $lastName, TransportInterface $transport, int $oneWayDistance)
    {
        Assertion::notBlank($lastName, 'The last name cannot be an empty string!');
        Assertion::greaterThan($oneWayDistance, 0, 'The one way distance cannot be less than 1!');

        $this->lastName = $lastName;
        $this->transport = $transport;
        $this->oneWayDistance = $oneWayDistance;
    }

    /**
     * @inheritDoc
     */
    public function getLastName() : string
    {
        return $this->lastName;
    }

    /**
     * @inheritDoc
     */
    public function getTransport() : TransportInterface
    {
        return $this->transport;
    }

    /**
     * @inheritDoc
     */
    public function getOneWayDistance() : int
    {
        return $this->oneWayDistance;
    }
}
