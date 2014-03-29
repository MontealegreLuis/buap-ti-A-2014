<?php
use \Autoloader\StandardAutoloader;
use \Html\Document;
use \Html\Element;
use \Html\Collection;
use \Exporter\HtmlExporter;
use \Handler\ExceptionHandler;
use \Handler\ErrorHandler;
use \Renderer\CallbackRenderer;
use \Filter\ToLowerFilter;

require 'Autoloader/StandardAutoloader.php';
spl_autoload_register(new StandardAutoloader());

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
