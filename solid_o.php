<?php

class SomeObject
{
    public function __construct(protected string $name)
    {
    }

    public function getObjectName(): string
    {
        return $this->name;
    }
}

class SomeObjectsHandler
{
    const HANDLERS = [
        'object_1' => 'handle_object_1',
        'object_2' => 'handle_object_2',
    ];

    public function handleObjects(array $objects): array
    {
        $handlers = [];

        foreach ($objects as $object) {
            assert($object instanceof SomeObject);

            // Вариант 1
            // $handlers[] = 'handle_' . $object->getObjectName();

            // Вариант 2
            if (isset(self::HANDLERS[$object->getObjectName()])) {
                $handlers[] = self::HANDLERS[$object->getObjectName()];
            }
        }

        return $handlers;
    }
}

$objects = [
    new SomeObject('object_1'),
    new SomeObject('object_2'),
    new SomeObject('object_3')
];

$soh = new SomeObjectsHandler();
$soh->handleObjects($objects);

assert(
    $soh->handleObjects($objects) === [
        'handle_object_1',
        'handle_object_2'
    ]
);
