<?php

declare(strict_types=1);

namespace Medicore\Transport;

/**
 * Description of Car
 *
 * @author Balázs Máté Petró <petrobalazsmate@gmail.com>
 */
final class Car extends AbstractTransport
{
    /**
     * The name of transport type.
     *
     * @var string
     */
    const NAME = 'Car';

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
        return 0.10;
    }
}
