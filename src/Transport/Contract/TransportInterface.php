<?php

declare(strict_types=1);

namespace Medicore\Transport\Contract;

/**
 * Description of TransportInterface
 *
 * @author Balázs Máté Petró <petrobalazsmate@gmail.com>
 */
interface TransportInterface
{
    /**
     * Returns the name of transport.
     *
     * @return string
     */
    public function getName() : string;

    /**
     * Returns the compensation value of transport.
     *
     * @return float
     */
    public function getCompensation() : float;
}
