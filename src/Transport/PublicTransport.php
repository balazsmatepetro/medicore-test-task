<?php

declare(strict_types=1);

namespace Medicore\Transport;

/**
 * Description of PublicTransport
 * 
 * @author Balázs Máté Petró <petrobalazsmate@gmail.com>
 */
abstract class PublicTransport extends AbstractTransport
{
    /**
     * @inheritDoc
     */
    public function getName() : string
    {
        return static::NAME;
    }

    /**
     * @inheritDoc
     */
    public function getCompensation() : float
    {
        return 0.25;
    }
}
