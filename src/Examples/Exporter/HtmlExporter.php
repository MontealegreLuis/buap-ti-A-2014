<?php
namespace Examples\Exporter;

use Examples\Renderer\Renderer;
use Examples\Renderer\ProvidesRendering;
use Examples\Html\Element;

class HtmlExporter
{
    use ProvidesRendering;

    public function export(Element $element)
    {
        echo $this->render($element);
    }
}
