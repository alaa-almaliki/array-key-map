<?php declare(strict_types=1);

namespace ArrayKey\Map\Source;

use ArrayKey\Map\ArrayMapInterface;

/**
 * Class SourceArray
 *
 * @package ArrayKey\Map\Source
 * @author  Alaa Al-Makiki <alaa.almaliki@gmail.com>
 */
class SourceArray implements ArrayMapInterface
{
    /**
     * @var array
     */
    protected $mappedKeys;

    /**
     * SourceArray constructor.
     * @param array $mappedKeys
     */
    public function __construct(array $mappedKeys)
    {
        $this->mappedKeys = $mappedKeys;
    }

    /**
     * @return array
     */
    public function getMappedKeys(): array
    {
        return $this->mappedKeys;
    }
}