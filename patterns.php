<?php
use \Events\EventsDispatcher;
use \Logger\FilesystemLogger;
use \Database\DriverManager;
use \Database\ResultSet\ReflectionResultSet;
use \Cache\FileSystemCacheAdapter;
use \Cache\FileSystemCache;
use \ProductCatalog\Listener\LogListedProducts;
use \ProductCatalog\ProductRepositoryCache;
use \ProductCatalog\ProductRepository;
use \ProductCatalog\Product;
use \ProductCatalog\ListAllProducts;

require 'autoload.php';

$manager = new DriverManager();
$connection = $manager->getConnection(require 'config/database.php');
$cache = new FileSystemCacheAdapter(new FileSystemCache('tmp/cache'));
$productRepository = new ProductRepositoryCache(new ProductRepository($connection), $cache);
$resultSet = new ReflectionResultSet(new Product());

$logger = new FilesystemLogger('tmp/logs/application.log');
$dispatcher = new EventsDispatcher();
$dispatcher->attach('products.listed', new LogListedProducts($logger));

$listProducts = new ListAllProducts($productRepository, $resultSet);
$listProducts->setEventsDispatcher($dispatcher);

$products = $listProducts->getAllProducts();
foreach ($products as $product) {
    echo "{$product->getModel()}\n";
}
