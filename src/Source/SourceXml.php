<?php declare(strict_types=1);

namespace ArrayKey\Map\Source;

use ArrayKey\Map\FileValidator;

/**
 * Class SourceXml
 *
 * @package ArrayKey\Map\Source
 * @author  Alaa Al-Makiki <alaa.almaliki@gmail.com>
 */
class SourceXml extends SourceFile
{
    const ARRAY_MAP_XPATH = '/array_map/keys/key';

    /**
     * SourceXml constructor.
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
        $xml = \simplexml_load_file($this->file);
        $xmlPath = $xml->xpath(self::ARRAY_MAP_XPATH);
        $xmlValues = array_map(function ($path) {
            return ['origin' => (string) $path->origin, 'mapped' => (string) $path->mapped];
        }, $xmlPath);

        foreach ($xmlValues as $value) {
            $this->mappedKeys[$value['origin']] = $value['mapped'];
        }

        return $this->mappedKeys;
    }
}
