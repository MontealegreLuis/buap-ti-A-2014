<?php
require 'autoload.php';

use Examples\Html\Element;
use Examples\Html\Document;

$stack = new SplStack();
$stack->push(new stdClass());
$stack->push(['Uno', 'Dos', 'Tres']);

var_dump($stack->pop());
var_dump($stack->pop());

$queue = new SplQueue();
$queue->enqueue(new Element('ul'));
$queue->enqueue((new Document(
    'html5', new Element('head'), new Element('body')
)));

var_dump($queue->dequeue());
var_dump($queue->dequeue());

$storage = new SplObjectStorage();
$storage->attach(new stdClass());
$storage->attach($queue);

foreach ($storage as $object) {
    var_dump($object);
}

$storage->detach($queue);

foreach ($storage as $object) {
    var_dump($object);
}
