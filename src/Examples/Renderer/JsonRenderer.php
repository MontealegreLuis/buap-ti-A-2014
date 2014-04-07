<?php
namespace Examples\Renderer;

use Examples\Html\Element;

class JsonRenderer implements Renderer
{
    public function render(Element $element)
    {
        $json = [
           'tag' => $element->getTag(),
           'content' => $element->content,
           'attributes' => $element->attributes,
        ];

        $json['children'] = [];
        if ($element->children()) {
            $children = $element->children();
            for ($i = 0; $i < $children->length; $i++) {
                $json['children'][] = $this->render($children->item($i));
            }
        }

        return json_encode($json);
    }
}
