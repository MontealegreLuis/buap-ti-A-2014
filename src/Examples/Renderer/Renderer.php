<?php
namespace Examples\Renderer;

use Examples\Html\Element;

interface Renderer
{
    public function render(Element $element);
}
