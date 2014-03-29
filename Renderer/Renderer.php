<?php
namespace Renderer;

use Html\Element;

interface Renderer
{
    public function render(Element $element);
}
