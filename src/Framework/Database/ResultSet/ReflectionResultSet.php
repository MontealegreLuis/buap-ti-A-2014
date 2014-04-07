<?php
namespace Framework\Database\ResultSet;

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
    public function populateAll(array $rows)
    {
        $properties = $this->getPrototypeProperties();

        foreach ($rows as $row) {
            $this->objects[] = $this->createFromPrototype($row, $properties);
        }
    }

    /**
     * @param array $row
     */
    public function populate(array $row)
    {
        $this->objects[0] = $this->createFromPrototype($row, $this->getPrototypeProperties());
    }

    /**
     * @return \ReflectionProperty[]
     */
    protected function getPrototypeProperties()
    {
        $reflectionClass = new ReflectionClass(get_class($this->prototype));

        return $reflectionClass->getProperties() ;
    }

    /**
     * @param  array  $properties
     * @return object
     */
    protected function createFromPrototype(array $row, array $properties)
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

    /**
     * @return array
     */
    public function getRow()
    {
        return $this->objects[0];
    }
}
