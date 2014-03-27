<?php
use \Autoloader\StandarAutoloader;
use \Html\Document;
use \Html\Element;
use \Html\Collection;
use \Renderer\HtmlRenderer;

require 'Autoloader/StandardAutoloader.php';
spl_autoload_register(new StandarAutoloader());

$document = new Document(
    'html5', new Element('head'), new Element('body')
);

$ul = new Collection('ul', [
    new Element('li', 'First'),
    new Element('li', 'Second'),
    new Element('li', 'Third'),
]);

$p = new Element('p');
$p->setContent('test');

$renderer = new HtmlRenderer();
echo $renderer->render($ul);
echo $renderer->render($p);
