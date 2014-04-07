<?php
namespace Application\Controller;

use Framework\Http\Request;
use Framework\Http\Response;
use ProductCatalog\ListAllProducts;

class ListProductsController
{
    /** @type ListAllProducts */
    protected $useCase;

    /**
     * @param ListAllProducts $useCase
     */
    public function __construct(ListAllProducts $listAllProducts)
    {
        $this->useCase = $listAllProducts;
    }

    /**
     * @param  Request  $request
     * @param  Response $response
     * @param  array    $routeParams
     * @return array
     */
    public function listAction(Request $request, Response $response, array $routeParams)
    {
        $response = $this->useCase->getAllProducts();

        return ['products' => $response->products];
    }
}
