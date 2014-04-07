<?php
use Framework\Database\DriverManager;
use Framework\Cache\FileSystemCacheAdapter;
use Framework\Cache\FileSystemCache;
use Framework\Database\ResultSet\ReflectionResultSet;
use Framework\Logger\FilesystemLogger;
use Framework\Events\EventsDispatcher;
use Framework\DependencyInjection\Container;
use ProductCatalog\ProductRepository;
use ProductCatalog\ProductRepositoryCache;
use ProductCatalog\Product;
use ProductCatalog\Listener\LogListedProducts;
use ProductCatalog\ListAllProducts;
use ProductCatalog\GetProductById;
use Application\Controller\ListProductsController;
use Application\Controller\ShowProductController;

return [
    'connection' => function(Container $sl) {
        $manager = new DriverManager();

        return $manager->getConnection(require 'config/database.php');
    },
    'cache' => function(Container $sl) {
        return new FileSystemCacheAdapter(new FileSystemCache('tmp/cache'));
    },
    'product.repository' => function(Container $sl) {
        return new ProductRepositoryCache(
            new ProductRepository($sl->get('connection')), $sl->get('cache')
        );
    },
    'resultSet' => function(Container $sl) {
        return new ReflectionResultSet(new Product());
    },
    'logger' => function(Container $sl) {
        return new FilesystemLogger('tmp/logs/application.log');
    },
    'dispatcher' => function(Container $sl) {
        return new EventsDispatcher();
    },
    'products.list.useCase' => function (Container $sl) {
        $dispatcher = $sl->get('dispatcher');
        $dispatcher->attach('products.listed', new LogListedProducts($sl->get('logger')));

        $listProducts = new ListAllProducts($sl->get('product.repository'), $sl->get('resultSet'));
        $listProducts->setEventsDispatcher($dispatcher);

        return $listProducts;
    },
    'products.list' => function (Container $sl) {
        return new ListProductsController($sl->get('products.list.useCase'));
    },
    'products.show.useCase' => function(Container $sl) {
    	return new GetProductById($sl->get('product.repository'), $sl->get('resultSet'));
    },
    'products.show' => function(Container $sl) {
    	return new ShowProductController($sl->get('products.show.useCase'));
    },
];