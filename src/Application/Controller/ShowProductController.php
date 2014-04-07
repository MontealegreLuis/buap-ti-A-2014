<?php
namespace Application\Controller;

use Framework\Http\Request;
use Framework\Http\Response;
use ProductCatalog\ProductRequest;
use ProductCatalog\GetProductById;

class ShowProductController
{
    /** @type GetProductById */
    protected $useCase;

    /**
     * @param ListAllProducts $useCase
     */
    public function __construct(GetProductById $getProductById)
    {
        $this->useCase = $getProductById;
    }

    public function showAction(Request $request, Response $response, array $routeParams)
    {
        $response = $this->useCase->getProduct(new ProductRequest($routeParams['id']));

        return ['product' => $response->product];
    }
}
