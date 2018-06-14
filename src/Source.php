<?php declare(strict_types=1);

namespace ArrayKey\Map;

/**
 * Class Source
 *
 * @package ArrayKey\Map
 * @author  Alaa Al-Makiki <alaa.almaliki@gmail.com>
 */
class Source implements SourceInterface
{
    /**
     * @var ArrayMapInterface
     */
    protected $arrayMap;

    /**
     * @var array
     */
    protected $sourceArray;

    /**
     * @var array
     */
    protected $mappedArray;

    /**
     * Source constructor.
     *
     * @param ArrayMapInterface $arrayMap
     * @param array $sourceArray
     */
    public function __construct(ArrayMapInterface $arrayMap, array $sourceArray)
    {
        $this->arrayMap = $arrayMap;
        $this->sourceArray = $sourceArray;
    }

    /**
     * @return array
     */
    public function getSourceArray(): array
    {
        return $this->sourceArray;
    }

    /**
     * @return array
     */
    public function getMappedArray(): array
    {
        $this->mapArray();
        return $this->mappedArray;
    }

    /**
     * @return Source
     */
    private function mapArray(): self
    {
        $keys = array_keys($this->sourceArray);
        $mappedKeys = $this->arrayMap->getMappedKeys();
        $replacedKeys =  \array_map(function (string $key) use ($mappedKeys) {
            if (\array_key_exists($key, $mappedKeys)) {
                return $mappedKeys[$key];
            }
            return $key;
        }, $keys);

        $this->mappedArray = \array_combine($replacedKeys, array_values($this->sourceArray));

        return $this;
    }
}
