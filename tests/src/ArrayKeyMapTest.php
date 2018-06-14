<?php declare(strict_types=1);

namespace ArrayKey\Map;
use ArrayKey\Map\Source\SourceArray;
use ArrayKey\Map\Source\SourceCsv;
use ArrayKey\Map\Source\SourceXml;

/**
 * Class ArrayKeyMapTest
 *
 * @package ArrayKey\Map
 * @author  Alaa Al-Makiki <alaa.almaliki@gmail.com>
 */
class ArrayKeyMapTest extends \PHPUnit\Framework\TestCase
{
    public function testArrayKeyMapByArray()
    {
        $sourceArray = [
            'First Name' => 'John',
            'Last Name' => 'Doe',
            'email' => 'john.doe@example.com',
            'Field Experience' => 10,
            'Current Job' => 'Software Engineer',
            'Department' => 'Web Development'
        ];

        $mappedKeys = [
            'First Name' => 'first_name',
            'Last Name' => 'last_name',
            'Field Experience' => 'experience',
            'Current Job' => 'job',
            'Department' => 'department'
        ];

        $expected = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@example.com',
            'experience' => 10,
            'job' => 'Software Engineer',
            'department' => 'Web Development'
        ];

        $arrayMapSource = new SourceArray($mappedKeys);
        $source = new Source($arrayMapSource, $sourceArray);

        $this->assertEquals($mappedKeys, $arrayMapSource->getMappedKeys());
        $this->assertTrue(\is_array($source->getMappedArray()));
        $this->assertTrue(\is_array($source->getSourceArray()));
        $this->assertEquals($expected, $source->getMappedArray());
    }

    public function testArrayKeyMapByCsv()
    {
        $sourceArray = [
            'First Name' => 'John',
            'Last Name' => 'Doe',
            'email' => 'john.doe@example.com',
            'Field Experience' => 10,
            'Current Job' => 'Software Engineer',
            'Department' => 'Web Development'
        ];


        $expected = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@example.com',
            'experience' => 10,
            'job' => 'Software Engineer',
            'department' => 'Web Development'
        ];

        $csvMapSource = new SourceCsv(new FileValidator(__DIR__ . '/../etc/keys.csv'));
        $source = new Source($csvMapSource, $sourceArray);

        $this->assertTrue(\is_array($source->getMappedArray()));
        $this->assertTrue(\is_array($source->getSourceArray()));
        $this->assertEquals($expected, $source->getMappedArray());
    }

    /**
     * @throws \Exception
     * @expectedException \Exception
     */
    public function testArrayKeyMapByCsvWithException()
    {
        $csvMapSource = new SourceCsv(new FileValidator(__DIR__ . '/etc/keys.csv'));
    }

    public function testArrayKeyMapByXml()
    {
        $sourceArray = [
            'First Name' => 'John',
            'Last Name' => 'Doe',
            'email' => 'john.doe@example.com',
            'Field Experience' => 10,
            'Current Job' => 'Software Engineer',
            'Department' => 'Web Development'
        ];


        $expected = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@example.com',
            'experience' => 10,
            'job' => 'Software Engineer',
            'department' => 'Web Development'
        ];

        $xmlMapSource = new SourceXml(new FileValidator(__DIR__ . '/../etc/keys.xml'));
        $source = new Source($xmlMapSource, $sourceArray);

        $this->assertTrue(\is_array($source->getMappedArray()));
        $this->assertTrue(\is_array($source->getSourceArray()));
        $this->assertEquals($expected, $source->getMappedArray());
    }
}