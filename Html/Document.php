<?php
namespace Html;

use \Html\Element;

class Document
{
    /** @type string */
    protected $doctype;

    /** @type Element */
    protected $body;

    /** @type $head */
    protected $head;

    /**
     * @param string  $doctype
     * @param Element $head
     * @param Element $body
     */
    public function __construct($doctype, Element $head, Element $body)
    {
        $this->doctype = $doctype;
        $this->head = $head;
        $this->body = $body;
    }
}
