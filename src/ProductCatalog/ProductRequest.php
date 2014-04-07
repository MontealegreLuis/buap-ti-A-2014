<?php
namespace ProductCatalog;

class ProductRequest
{
    /** @type integer */
    public $productId;

    /**
     * @param integer $productId
     */
    public function __construct($productId)
    {
        $this->productId = $productId;
    }
}
