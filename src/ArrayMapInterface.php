<?php declare(strict_types=1);

namespace ArrayKey\Map;

/**
 * Interface ArrayMapInterface
 *
 * @package ArrayKey\Map
 * @author  Alaa Al-Makiki <alaa.almaliki@gmail.com>
 */
interface ArrayMapInterface
{
    /**
     * @return array
     */
    public function getMappedKeys(): array;
}