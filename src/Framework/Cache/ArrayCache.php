<?php
namespace Framework\Cache;

class ArrayCache
{
    /** @type mixed[] */
    protected $items = [];

    public function addItem($item, $value)
    {
        $this->items[$item] = $value;
    }

    public function getItem($item)
    {
        return $this->items[$item];
    }

    public function removeItem($item)
    {
        unset($this->items[$item]);
    }

    public function hasItem($item)
    {
        return isset($this->items[$item]);
    }
}
