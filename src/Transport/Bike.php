<?php

declare(strict_types=1);

namespace Medicore\Transport;

/**
 * Description of Bike
 *
 * @author Balázs Máté Petró <petrobalazsmate@gmail.com>
 */
final class Bike extends AbstractTransport
{
    /**
     * The name of transport type.
     *
     * @var string
     */
    const NAME = 'Bike';

    /**
     * @inheritDoc
     */
    public function getName() : string
    {
        return self::NAME;
    }

    /**
     * @inheritDoc
     */
    public function getCompensation() : float
    {
        return 0.50;
    }
}
