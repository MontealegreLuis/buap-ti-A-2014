<?php
namespace Examples\Renderer;

use Examples\Html\Element;

class CallbackRenderer implements Renderer
{
    protected $renderingFunction;

    public function __construct(Callable $renderingFunction)
    {
       $this->renderingFunction = $renderingFunction;
    }
    /**
     * @see \Renderer\Renderer::render()
     */
    public function render(Element $element)
    {
        $renderingFunction = $this->renderingFunction;

        return $renderingFunction($element);
    }
}
