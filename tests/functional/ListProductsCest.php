<?php
use \TestGuy;

class ListProductsCest
{
    public function _before()
    {
    }

    public function _after()
    {
    }

    // tests
    public function listOfProductsIsShownTest(TestGuy $i)
    {
        $i->wantTo('ensure that the list of products works');
        $i->amOnPage('/products/list');
        $i->see('Ejemplo de MVC');
    }

}