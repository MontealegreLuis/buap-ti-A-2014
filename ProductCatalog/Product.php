<?php
namespace ProductCatalog;

class Product
{
    /** @type string */
    protected $model;

    /** @type string */
    protected $features;

    public function getModel()
    {
        return $this->model;
    }

    public function getFeatures()
    {
        return $this->features;
    }
}
