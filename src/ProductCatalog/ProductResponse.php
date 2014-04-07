<?php
namespace ProductCatalog;

class ProductResponse
{
    /** @type ProductView*/
    public $product;

    /**
     * @param ProductView $product
     */
    public function __construct(ProductView $product)
    {
        $this->product = $product;
    }
}
