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
     * The first name of employee.
     *
     * @var string
     */
    private $firstName;

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
     * @param string $firstName The first name of employee.
     * @param TransportInterface $transport How the employee commutes to work.
     * @param int $oneWayDistance The one way travelled distance.
     */
    public function __construct(string $firstName, TransportInterface $transport, int $oneWayDistance)
    {
        Assertion::notBlank($firstName, 'The first name cannot be an empty string!');
        Assertion::greaterThan($oneWayDistance, 0, 'The one way distance cannot be less than 1!');

        $this->firstName = $firstName;
        $this->transport = $transport;
        $this->oneWayDistance = $oneWayDistance;
    }

    /**
     * @inheritDoc
     */
    public function getFirstName() : string
    {
        return $this->firstName;
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
