<?php
namespace ProductCatalog;

use Framework\Cache\CacheAdapter;

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

    /**
     * @return array
     */
    public function productOfId($productId)
    {
        $cacheKey = "products-$productId";
        if ($this->cache->contains($cacheKey)) {
            return $this->cache->fetch($cacheKey);
        }

        $product = $this->repository->productOfId($productId);

        $this->cache->save($cacheKey, $product);

        return $product;
    }
}
