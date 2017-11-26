<?php

declare(strict_types=1);

namespace Medicore\CompensationReport\Writer;

use DateTimeImmutable;
use Exception;
use InvalidArgumentException;
use SplTempFileObject;
use League\Flysystem\FilesystemInterface;
use League\Flysystem\File;
use League\Csv\Writer;
use Medicore\CompensationReport\Contract\ValueObject\ReportItemInterface;
use Medicore\CompensationReport\Contract\Writer\WriterInterface;

// TODO: Add unit test!

/**
 * Description of Csv
 *
 * @author Balázs Máté Petró <petrobalazsmate@gmail.com>
 */
final class Csv implements WriterInterface
{
    /**
     * The PHP League FilesystemInterface instance.
     *
     * @var FilesystemInterface
     */
    private $filesystem;

    /**
     * Creates a new Csv writer instance.
     *
     * @param FilesystemInterface $filesystem The PHP League Filesystem instance.
     */
    public function __construct(FilesystemInterface $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    /**
     * @inheritDoc
     */
    public function write(array $reportItems) : File
    {
        $this->validateReportItems($reportItems);

        $csv = Writer::createFromFileObject(new SplTempFileObject);

        foreach ($reportItems as $reportItem) {
            $this->writeLine($reportItem, $csv);
        }

        $filename = $this->createFileName();

        if (!$this->filesystem->write($filename, $csv->getContent())) {
            throw new Exception('The file couldn\'t be written!');
        }

        return $this->filesystem->get($filename);
    }

    /**
     * Creates and returns a unique file name.
     *
     * @return string
     */
    private function createFileName() : string
    {
        return 'report-' . (new DateTimeImmutable)->format('Y-m-d-H-i-s') . uniqid((string)rand()) . '.csv';
    }

    /**
     * Validates the given report items.
     *
     * @param array[ReportItemInterface] $reportItems The report items to check.
     * @throws InvalidArgumentException Thrown when one of the items is invalid.
     */
    private function validateReportItems(array $reportItems)
    {
        foreach ($reportItems as $reportItem) {
            if (!is_object($reportItem) || !($reportItem instanceof ReportItemInterface)) {
                throw new InvalidArgumentException('All items must be instance of ' . ReportItemInterface::class);
            }
        }
    }

    /**
     * Writes the report item to the given CSV file.
     *
     * @param ReportItemInterface $reportItem The report item to write.
     * @param Writer $csv The target CSV file.
     */
    private function writeLine(ReportItemInterface $reportItem, Writer $csv)
    {
        $csv->insertOne([
            $reportItem->getEmployee(),
            $reportItem->getTransport(),
            $reportItem->getTravelledDistance(),
            $reportItem->getCompensation(),
            $reportItem->getPaymentDate()
        ]);
    }
}
