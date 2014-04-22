<?php
namespace ProductCatalog;

class Product
{
    /** @type integer */
    protected $id;

    /** @type string */
    protected $model;

    /** @type string */
    protected $features;

    /**
     * @param string  $model
     * @param string  $features
     * @param integer $id
     */
    public function __construct($model, $features, $id = null)
    {
        $this->model = $model;
        $this->features = $features;
        $this->id = $id;
    }

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
