<?php

declare(strict_types=1);

namespace Medicore\CompensationReport\Contract\Writer;

use Exception;
use InvalidArgumentException;
use League\Flysystem\File;

/**
 * Description of WriterInterface
 *
 * @author Balázs Máté Petró <petrobalazsmate@gmail.com>
 */
interface WriterInterface
{
    /**
     * Creates and returns the file based output.
     *
     * @param array $reportItems The report items to write a file.
     * @return File The created file.
     * @throws InvalidArgumentException Thrown when one of report items is invalid.
     * @throws Exception Thrown when the file couldn't be written to the filesystem.
     */
    public function write(array $reportItems) : File;
}
