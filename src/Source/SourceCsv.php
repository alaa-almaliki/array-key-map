<?php declare(strict_types=1);

namespace ArrayKey\Map\Source;

use ArrayKey\Map\FileValidator;

/**
 * Class SourceCsv
 *
 * @package ArrayKey\Map\Source
 * @author  Alaa Al-Makiki <alaa.almaliki@gmail.com>
 */
class SourceCsv extends SourceFile
{
    /**
     * SourceCsv constructor.
     * @param FileValidator $fileValidator
     * @throws \Exception
     */
    public function __construct(FileValidator $fileValidator)
    {
        parent::__construct($fileValidator);
    }

    /**
     * @return array
     */
    public function getMappedKeys(): array
    {
        $handler = $this->getFileHandler();
        if (!$handler) {
            return [];
        }

        while (($lines = \fgetcsv($handler)) !== false) {
            if (\is_array($lines) && \count($lines) === 2) {
                $this->mappedKeys[$lines[0]] = $lines[1];
            }
        }
        $this->closeFile();

        return $this->mappedKeys;
    }
}
