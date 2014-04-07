<?php
namespace ProductCatalog;

use Framework\Database\ResultSet\ResultSet;

class GetProductById
{
    /** @type ProductRepositoryInterface */
    protected $repository;

    /** @type ResultSet */
    protected $resultSet;

    /**
     * @param ProductRepositoryInterface $repository
     * @param ResultSet                  $resultSet
     */
    public function __construct(ProductRepositoryInterface $repository, ResultSet $resultSet)
    {
        $this->repository = $repository;
        $this->resultSet = $resultSet;
    }

    /**
     * @param  ProductRequest  $request
     * @return ProductResponse
     */
    public function getProduct(ProductRequest $request)
    {
        $this->resultSet->populate($this->repository->productOfId($request->productId));
        $product = $this->resultSet->getRow();

        return new ProductResponse($product->render(new ProductView()));
    }
}
