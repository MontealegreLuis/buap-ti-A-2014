<?php
namespace ProductCatalog;

use Cache\CacheAdapter;

class ProductRepositoryCache implements ProductRepositoryInterface
{
    /** @type ProductRepository */
    protected $repository;

    /** @type CacheAdapter */
    protected $cache;

    /**
     * @param ProductRepository $repository
     * @param CacheAdapter      $cache
     */
    public function __construct(ProductRepository $repository, CacheAdapter $cache)
    {
       $this->repository = $repository;
       $this->cache = $cache;
    }

    /**
     * @return array
     */
    public function allProducts()
    {
        if ($this->cache->contains('products')) {
            return $this->cache->fetch('products');
        }

        $products = $this->repository->allProducts();

        $this->cache->save('products', $products);

        return $products;
    }
}
