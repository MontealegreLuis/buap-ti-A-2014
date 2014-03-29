<?php
namespace Exporter;

use Renderer\Renderer;
use Html\Element;
use Renderer\ProvidesRendering;

class HtmlExporter
{
    use ProvidesRendering;

    public function export(Element $element)
    {
        echo $this->render($element);
    }
}
