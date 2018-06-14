<?php declare(strict_types=1);

namespace ArrayKey\Map\Source;

use ArrayKey\Map\ArrayMapInterface;
use ArrayKey\Map\FileValidator;

/**
 * Class SourceFile
 *
 * @package ArrayKey\Map\Source
 * @author  Alaa Al-Makiki <alaa.almaliki@gmail.com>
 */
abstract class SourceFile implements ArrayMapInterface
{
    /**
     * @var array
     */
    protected $mappedKeys;

    /**
     * @var string
     */
    protected $file;

    /**
     * @var resource
     */
    protected $fileHandler;

    /**
     * SourceFile constructor.
     * @param FileValidator $fileValidator
     * @throws \Exception
     */
    public function __construct(FileValidator $fileValidator)
    {
        $this->file = $fileValidator->getFile();
    }

    /**
     * @return resource
     */
    public function getFileHandler()
    {
        $this->fileHandler = \fopen($this->file, "r");
        return $this->fileHandler;
    }

    /**
     * @return bool
     */
    public function closeFile(): bool
    {
        return \fclose($this->fileHandler);
    }
}