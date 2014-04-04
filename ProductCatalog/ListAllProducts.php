<?php
namespace ProductCatalog;

use \Events\EventsProvider;
use \Events\ProvidesEvents;
use \ProductCatalog\ProductRepositoryInterface;
use \Database\ResultSet\ResultSet;

class ListAllProducts implements EventsProvider
{
    use ProvidesEvents;

    /** @type ProductRepositoryInterface */
    protected $productRepository;

    /** @type ResultSet */
    protected $resultSet;

    /**
     * @param ProductRepositoryInterface $repository
     * @param ResultSet                  $resultSet
     */
    public function __construct(ProductRepositoryInterface $repository, ResultSet $resultSet)
    {
        $this->productRepository = $repository;
        $this->resultSet = $resultSet;
    }

    /**
     * @return Product[]
     */
    public function getAllProducts()
    {
        $products = $this->productRepository->allProducts();
        $this->resultSet->populate($products);
        $this->dispatcher->dispatch('products.listed', $products);

        return $this->resultSet->getRows();
    }
}
