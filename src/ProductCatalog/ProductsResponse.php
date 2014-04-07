<?php
namespace ProductCatalog;

class ProductsResponse
{
    /** @type ProductView[] */
    public $products;

    /**
     * @param Product[] $products
     */
    public function __construct(array $products)
    {
        array_walk($products, function(Product &$product){
            $product = $product->render(new ProductView());
        });
        $this->products = $products;
    }
}
