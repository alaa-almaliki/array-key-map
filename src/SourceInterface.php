<?php declare(strict_types=1);

namespace ArrayKey\Map;

/**
 * Interface SourceInterface
 *
 * @package ArrayKey\Map
 * @author  Alaa Al-Makiki <alaa.almaliki@gmail.com>
 */
interface SourceInterface
{
    /**
     * @return array
     */
    public function getSourceArray(): array;

    /**
     * @return array
     */
    public function getMappedArray(): array;
}