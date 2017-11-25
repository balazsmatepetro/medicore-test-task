<?php

declare(strict_types=1);

namespace Medicore\Transport;

use Medicore\Transport\Contract\TransportInterface;

/**
 * Description of AbstractTransport
 * 
 * @author Balázs Máté Petró <petrobalazsmate@gmail.com>
 */
abstract class AbstractTransport implements TransportInterface
{
    /**
     * Returns the string representation of transport type.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }
}
