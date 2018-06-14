<?php declare(strict_types=1);

namespace ArrayKey\Map;

/**
 * Class FileValidator
 *
 * @package ArrayKey\Map
 * @author  Alaa Al-Makiki <alaa.almaliki@gmail.com>
 */
class FileValidator
{
    /**
     * @var string
     */
    protected $file;

    /**
     * FileValidator constructor.
     * @param string $file
     */
    public function __construct(string $file)
    {
        $this->file = $file;
    }

    /**
     * @throws \Exception
     */
    protected function validate()
    {
        if (!\file_exists($this->file) || !\is_file($this->file)) {
            throw new \Exception(sprintf('File: %s is not exist', $this->file));
        }

        if (!\is_readable($this->file)) {
            throw new \Exception(sprintf('File: %s is not readable'));
        }
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getFile(): string
    {
        $this->validate();
        return $this->file;
    }
}