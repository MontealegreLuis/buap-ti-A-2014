<?php
namespace Examples\Html;

/**
 * @property string $content
 */
class Element
{
    /** @type string */
    protected $tag;

    /** @type array */
    protected $attributes;

    /** @type string */
    protected $content;

    /** @type Collection */
    protected $children;

    /**
     * @param string   $tag
     * @param string   $content
     * @param string[] $attributes
     */
    public function __construct($tag, $content = null, $attributes = [], Collection $children = null)
    {
        $this->tag = $tag;
        $this->content = $content;
        $this->attributes = $attributes;
        $this->children = $children;
    }

    /**
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param string $name
     * @param array  $arguments
     */
    public function __call($name, array $arguments)
    {
        if ($name === 'setContent') {
            $this->content = $arguments[0];

            return;
        }

        if ($name === 'setAttributes') {
            $this->attributes = $arguments[0];

            return;
        }

        throw new \RuntimeException("Invalida method $name");
    }

    /**
     * @param  string $property
     * @return string | array
     */
    public function __get($property)
    {
        if ($property == 'attributes') {
            return $this->attributes;
        }

        if ($property == 'content') {
            return $this->content;
        }
    }

    /**
     * @return Collection
     */
    public function children()
    {
        return  $this->children;
    }
}
