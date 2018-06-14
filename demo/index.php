<?php
require_once '../src/ArrayMapInterface.php';
require_once '../src/Source/SourceArray.php';
require_once '../src/Source/SourceFile.php';
require_once '../src/Source/SourceCsv.php';
require_once '../src/Source/SourceXml.php';
require_once '../src/FileValidator.php';

require_once '../src/SourceInterface.php';
require_once '../src/Source.php';


$array = [
    'Employee',
    'First Name' => 'John',
    'Last Name' => 'Doe',
    'email' => 'john.doe@example.com',
    'Field Experience' => 10,
    'Current Job' => 'Software Engineer',
    'Department' => 'Web Development'
];

$mappedKeys = [
    0 => 'type',
    'First Name' => 'first_name',
    'Last Name' => 'last_name',
    'Field Experience' => 'experience',
    'Current Job' => 'job',
    'Department' => 'department'
];

$sourceArray = new \ArrayKey\Map\Source\SourceArray($mappedKeys);
$sourceCsv = new \ArrayKey\Map\Source\SourceCsv(new \ArrayKey\Map\FileValidator(__DIR__ . '/etc/keys.csv'));
$sourceXml = new \ArrayKey\Map\Source\SourceXml(new \ArrayKey\Map\FileValidator(__DIR__ . '/etc/keys.xml'));

$source = new \ArrayKey\Map\Source($sourceArray, $array);
#$source = new \ArrayKey\Map\Source($sourceCsv, $array);
#$source = new \ArrayKey\Map\Source($sourceXml, $array);

print_r($source->getSourceArray());
print_r($source->getMappedArray());