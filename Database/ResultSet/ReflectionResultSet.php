<?php
namespace Database\ResultSet;

class ReflectionResultSet
{
    protected $prototype;
    protected $objects = [];

    public function __construct($prototype)
    {
        $this->prototype = $prototype;
    }

    public function populate(array $rows)
    {
        $className = get_class($this->prototype);
        $reflectionClass = new \ReflectionClass($className);
        $properties = $reflectionClass->getProperties() ;

        foreach ($rows as $row) {
            $object = clone $this->prototype;
            foreach ($properties as $property) {
                $property->setAccessible(true);
                $property->setValue($object, $row[$property->getName()]);
            }
            $this->objects[] = $object;
        }
    }

    public function getRows()
    {
        return $this->objects;
    }
}
