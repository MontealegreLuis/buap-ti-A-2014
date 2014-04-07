<?php
namespace ProductCatalog;

class Product
{
    /** @type ineteger */
    protected $id;

    /** @type string */
    protected $model;

    /** @type string */
    protected $features;

    /**
     * @param  ProductView $view
     * @return ProductView
     */
    public function render(ProductView $view)
    {
        $view->id = $this->id;
        $view->model = $this->model;
        $view->features = $this->features;

        return $view;
    }
}
