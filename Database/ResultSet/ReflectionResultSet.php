<?php
namespace Database\ResultSet;

use \ReflectionClass;

class ReflectionResultSet implements ResultSet
{
    /** @type object */
    protected $prototype;

    /** @type object[] */
    protected $objects = [];

    /**
     * @param object $prototype
     */
    public function __construct($prototype)
    {
        $this->prototype = $prototype;
    }

    /**
     * @param array $rows
     */
    public function populate(array $rows)
    {
        $reflectionClass = new ReflectionClass(get_class($this->prototype));
        $properties = $reflectionClass->getProperties() ;

        foreach ($rows as $row) {
            $this->objects[] = $this->createObject($row, $properties);
        }
    }

    /**
     * @param  array  $properties
     * @return object
     */
    protected function createObject(array $row, array $properties)
    {
        $object = clone $this->prototype;
        foreach ($properties as $property) {
            $property->setAccessible(true);
            $property->setValue($object, $row[$property->getName()]);
        }

        return $object;
    }

    /**
     * @return array
     */
    public function getRows()
    {
        return $this->objects;
    }
}
