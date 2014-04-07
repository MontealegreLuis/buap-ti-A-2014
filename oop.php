<?php
require 'autoload.php';

use \Examples\Html\Document;
use \Examples\Html\Element;
use \Examples\Html\Collection;
use \Examples\Exporter\HtmlExporter;
use \Examples\Handler\ExceptionHandler;
use \Examples\Handler\ErrorHandler;
use \Examples\Renderer\CallbackRenderer;
use \Examples\Filter\ToLowerFilter;

$ul = new Collection('ul', [
    new Element('li', 'First'),
    new Element('li', 'Second'),
    new Element('li', 'Third'),
]);

$p = new Element('p');
$p->setContent('test');

set_error_handler(new ErrorHandler());

$filter = new ToLowerFilter();

$exporter = new HtmlExporter();
$exporter->setRenderer(new CallbackRenderer(
    function(Element $element) use ($filter) {
        $text = $element->content;
        if ($element->children()) {
            $children = $element->children();
            for ($i = 0; $i < $children->length; $i++) {
                $text .= $children->item($i)->content;
            }
        }

        return $filter->filter($text);
    }
));
$exporter->export($ul);

set_exception_handler(new ExceptionHandler());

try {
    $document = new Document(
        'html5', new Element('head'), new Element('li')
    );
} catch (Exception $e) {
    echo '....';

}
echo 'It worked';
