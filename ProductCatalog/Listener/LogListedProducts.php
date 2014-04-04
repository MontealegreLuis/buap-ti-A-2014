<?php
namespace ProductCatalog\Listener;

use \Logger\Logger;

class LogListedProducts
{
    /** @type Logger */
    protected $logger;

    /**
     * @param Logger $logger
     */
    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param array $products
     */
    public function __invoke(array $products)
    {
        $products = json_encode($products, JSON_PRETTY_PRINT);
        $this->logger->log("The following products have been listed $products");
    }
}
