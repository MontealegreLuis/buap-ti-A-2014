<?php
namespace ProductCatalog;

use \Database\Query\QueryBuilder;
use \PDO;

class ProductRepository implements ProductRepositoryInterface
{
    /** @type PDO */
    protected $connection;

    /**
     * @param PDO $connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return array
     */
    public function allProducts()
    {
        $builder = new QueryBuilder();
        $query = $builder->createQuery()
                         ->select(['*'])
                         ->from(['product'])
                         ->getQuery();

        $statement = $this->connection->prepare($query->getSQL());
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
