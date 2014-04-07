<?php
namespace ProductCatalog;

interface ProductRepositoryInterface
{
    /**
     * @return array
     */
    public function allProducts();

    /**
     * @return array
     */
    public function productOfId($productId);
}
