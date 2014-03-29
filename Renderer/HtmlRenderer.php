<?php
namespace Renderer;

use Html\Element;

class HtmlRenderer implements Renderer
{
    /**
     * @param  Element $element
     * @return string
     */
    public function render(Element $element)
    {
        $attributes = ' ';
        foreach ($element->attributes as $attribute => $value) {
            $attributes .= "{$attribute}=\"{$value}\" ";
        }
        $attributes = trim($attributes);

        $content = $element->content;
        if ($element->children()) {
            $children = $element->children();
            for ($i = 0; $i < $children->length; $i++) {
              $content .= $this->render($children->item($i));
            }
        }

        return "<{$element->getTag()}{$attributes}>{$content}</{$element->getTag()}>";

    }
}
