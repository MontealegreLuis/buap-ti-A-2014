<?php
namespace ProductCatalog;

use \Database\Query\QueryBuilder;
use \Database\ResultSet\ReflectionResultSet;
use \Cache\CacheAdapter;
use \PDO;

class ProductRepository
{
    /** @type PDO */
    protected $connection;

    /** @type CacheAdapter */
    protected $cache;

    /**
     * @param PDO          $connection
     * @param CacheAdapter $cache
     */
    public function __construct(PDO $connection, CacheAdapter $cache)
    {
        $this->connection = $connection;
        $this->cache = $cache;
    }

    /**
     * @return Product[]
     */
    public function allProducts()
    {
        if ($this->cache->contains('products')) {
            return $this->cache->fetch('products');
        }

        $builder = new QueryBuilder();
        $query = $builder->createQuery()
                         ->select(['*'])
                         ->from(['product'])
                         ->getQuery();

        $statement = $this->connection->prepare($query->getSQL());
        $statement->execute();

        $resultSet = new ReflectionResultSet(new Product());
        $resultSet->populate($statement->fetchAll(PDO::FETCH_ASSOC));

        $products = $resultSet->getRows();

        $this->cache->save('products', $products);

        return $products;
    }
}
