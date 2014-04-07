<?php
namespace Examples;

use \Iterator;
use \ArrayAccess;
use \Countable;

class Collection implements Iterator, ArrayAccess, Countable
{
    protected $items;
    protected $index;

    public function __construct(array $items)
    {
        $this->items = $items;
        $this->index = 0;
    }

    public function current ()
    {
        return $this->items[$this->index];
    }

    public function next ()
    {
        return $this->index++;
    }

    public function key ()
    {
        return $this->index;
    }

    public function valid ()
    {
        return $this->index < $this->count();
    }

    public function rewind ()
    {
        $this->index = 0;
    }

    public function offsetExists ($offset)
    {
        return $offset >= 0 || $offset < $this->count();
    }

    public function offsetGet ($offset)
    {
        return $this->items[$offset];
    }

    public function offsetSet ($offset, $value)
    {
        $this->items[$offset] = $value;
    }

    public function offsetUnset ($offset)
    {
        unset($this->items[$offset]);
    }

    public function count()
    {
        return count($this->items);
    }
}
