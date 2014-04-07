<?php
namespace ProductCatalog;

use \Framework\Events\EventsProvider;
use \Framework\Events\ProvidesEvents;
use \Framework\Database\ResultSet\ResultSet;
use \ProductCatalog\ProductRepositoryInterface;

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
        $this->resultSet->populateAll($products);
        $this->dispatcher->dispatch('products.listed', $products);

        return new ProductsResponse($this->resultSet->getRows());
    }
}
