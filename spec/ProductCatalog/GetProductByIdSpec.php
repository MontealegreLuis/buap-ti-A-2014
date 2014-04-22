<?php
namespace spec\ProductCatalog;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use ProductCatalog\ProductResponse;
use ProductCatalog\ProductRepositoryInterface;
use Framework\Database\ResultSet\ResultSet;
use ProductCatalog\Product;
use ProductCatalog\ProductRequest;
use ProductCatalog\ProductView;

class GetProductByIdSpec extends ObjectBehavior
{
    function it_is_initializable(ProductRepositoryInterface $repository, ResultSet $resultset)
    {
        $this->beConstructedWith($repository, $resultset);
        $this->shouldHaveType('ProductCatalog\GetProductById');
    }

    function it_retrieves_an_existing_product_by_its_id(
        ProductResponse $productResponse,
        ProductRepositoryInterface $repository,
        ResultSet $resultset,
        Product $product
    )
    {
        $productId = 1;
        $productData = [
            'model' => 'Laptop',
            'features' => 'Super fast',
            'id' => $productId
        ];
        $view = new ProductView();
        $view->id = $productId;
        $view->model = $productData['model'];
        $view->features = $productData['features'];

        $repository->productOfId($productId)->willReturn($productData);
        $resultset->populate($productData)->shouldBeCalled();
        $resultset->getRow()->willReturn($product);

        $product->render(Argument::any())->willReturn($view);

        $this->beConstructedWith($repository, $resultset);
        $response = $this->getProduct(new ProductRequest($productId));
        $response->product->shouldBeEqualTo($view);
    }
}
