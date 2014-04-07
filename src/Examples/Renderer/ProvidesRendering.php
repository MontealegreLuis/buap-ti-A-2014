<?php
namespace Examples\Renderer;

use Examples\Html\Element;

trait ProvidesRendering
{
    protected $renderer;

    public function setRenderer($renderer)
    {
        $this->renderer = $renderer;
    }

    public function render(Element $element)
    {
        return $this->renderer->render($element);
    }
}
