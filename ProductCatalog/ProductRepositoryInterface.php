<?php
namespace ProductCatalog;

interface ProductRepositoryInterface
{
    /**
     * @return array
     */
    public function allProducts();
}
