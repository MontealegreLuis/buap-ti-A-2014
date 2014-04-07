<?php
namespace Examples\Html;

use \PHPUnit_Framework_TestCase;

class ElementTest extends PHPUnit_Framework_TestCase
{
    public function testContentCanBeModified()
    {
        $element = new Element('p', 'Hola');
    	$this->assertEquals('Hola', $element->content);
    	$element->setContent('Adios');
    	$this->assertEquals('Adios', $element->content);
    }
}