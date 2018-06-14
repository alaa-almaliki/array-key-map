# Array Key Map
Ever wanted to rename array keys to suit your requirements but it will take many lines that results in an ugly code? Here is a clean way to do it

# Installation
By Composer: `composer require alaa/array-key-map`

# Documentation
There are three types you can use to map your array keys against the keys you want your array to be mapped with.

## 1. Simply using an array to map keys
Example
```
$array = [
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

$sourceArray = new \ArrayKey\Map\Source\SourceArray($mappedKeys);
$source = new \ArrayKey\Map\Source($sourceArray, $array);
print_r($source->getSourceArray());
//result:
Array
(
    [First Name] => John
    [Last Name] => Doe
    [email] => john.doe@example.com
    [Field Experience] => 10
    [Current Job] => Software Engineer
    [Department] => Web Development
)

print_r($source->getMappedArray());
//result:
Array
(
    [first_name] => John
    [last_name] => Doe
    [email] => john.doe@example.com
    [experience] => 10
    [job] => Software Engineer
    [department] => Web Development
)

```

## 2. Csv Mapping to map array keys
Example:

```
$array = [
    'First Name' => 'John',
    'Last Name' => 'Doe',
    'email' => 'john.doe@example.com',
    'Field Experience' => 10,
    'Current Job' => 'Software Engineer',
    'Department' => 'Web Development'
];

keys.csv
|------------------|------------|
| First Name       | first_name |
|------------------|------------|
| Last Name        | last_name  |
|------------------|------------|
| Field Experience | experience |
|------------------|------------|
| Current Job      | job        |
|------------------|------------|
| Department       | department |
|------------------|------------|

$sourceCsv = new \ArrayKey\Map\Source\SourceCsv(new \ArrayKey\Map\FileValidator(__DIR__ . '/keys.csv'));
$source = new \ArrayKey\Map\Source($sourceCsv, $array);

print_r($source->getSourceArray());
//result:
Array
(
    [First Name] => John
    [Last Name] => Doe
    [email] => john.doe@example.com
    [Field Experience] => 10
    [Current Job] => Software Engineer
    [Department] => Web Development
)

print_r($source->getMappedArray());
//result:
Array
(
    [first_name] => John
    [last_name] => Doe
    [email] => john.doe@example.com
    [experience] => 10
    [job] => Software Engineer
    [department] => Web Development
)

```

## 3. Xml Mapping to map array keys
Example:
```
$array = [
    'First Name' => 'John',
    'Last Name' => 'Doe',
    'email' => 'john.doe@example.com',
    'Field Experience' => 10,
    'Current Job' => 'Software Engineer',
    'Department' => 'Web Development'
];

keys.xml
<?xml version="1.0" encoding="UTF-8" ?>
<array_map>
    <keys>
        <key>
            <origin>First Name</origin>
            <mapped>first_name</mapped>
        </key>
        <key>
            <origin>Last Name</origin>
            <mapped>last_name</mapped>
        </key>
        <key>
            <origin>Field Experience</origin>
            <mapped>experience</mapped>
        </key>
        <key>
            <origin>Current Job</origin>
            <mapped>job</mapped>
        </key>
        <key>
            <origin>Department</origin>
            <mapped>department</mapped>
        </key>
    </keys>
</array_map>

$sourceXml = new \ArrayKey\Map\Source\SourceXml(new \ArrayKey\Map\FileValidator(__DIR__ . '/keys.xml'));
$source = new \ArrayKey\Map\Source($sourceXml, $array);

print_r($source->getSourceArray());
//result:
Array
(
    [First Name] => John
    [Last Name] => Doe
    [email] => john.doe@example.com
    [Field Experience] => 10
    [Current Job] => Software Engineer
    [Department] => Web Development
)

print_r($source->getMappedArray());
//result:
Array
(
    [first_name] => John
    [last_name] => Doe
    [email] => john.doe@example.com
    [experience] => 10
    [job] => Software Engineer
    [department] => Web Development
)

```

# Limitation
The library is made to work on single arrays only, not multidimensional arrays. 

# LICENSE
MIT