<?php
namespace Html;

use \Html\Element;
use \Exception;

class Document
{
    /** @type string */
    protected $doctype;

    /** @type Element */
    protected $body;

    /** @type $head */
    protected $head;

    /**
     * @param  string    $doctype
     * @param  Element   $head
     * @param  Element   $body
     * @throws Exception
     */
    public function __construct($doctype, Element $head, Element $body)
    {
        $this->doctype = $doctype;
        if ('head' !== $head->getTag()) {
            throw new Exception('The head element should have the "head" tag');
        }
        $this->head = $head;
        if ('body' !== $body->getTag()) {
            throw new Exception('The head element should have the "body" tag');
        }
        $this->body = $body;
    }
}
