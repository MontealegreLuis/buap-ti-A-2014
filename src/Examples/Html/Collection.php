<?php
namespace Examples\Html;

/**
 * @property $length integer
 */
class Collection extends Element
{
    /** @type integer */
    protected $length;

    /**
     * @param Element[] $elements
     */
    public function __construct($tag, array $items = [],  array $attributes = [])
    {
        $this->tag = $tag;
        $this->attributes = $attributes;
        $this->length = count($items);
        $this->items = $items;
        $this->children = $this;
    }

    /**
     * @param  integer $index
     * @return Element
     */
    public function item($index)
    {
        return $this->items[$index];
    }

    /**
     * @param Element $item
     */
    public function addItem(Element $item)
    {
        $this->items[] = $item;
        $this->length++;
    }

    /**
     * @see \Html\Element::__get()
     */
    public function __get($property)
    {
        if ($property === 'length') {
            return $this->length;
        }

        return parent::__get($property);
    }
}
