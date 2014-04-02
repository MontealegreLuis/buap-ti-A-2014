<?php
use Database\DriverManager;
use ProductCatalog\ProductRepository;
use Cache\FileSystemCacheAdapter;
use Cache\FileSystemCache;

require 'autoload.php';

$manager = new DriverManager();
$connection = $manager->getConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'dbname' => 'admin_agata',
    'username' => 'agata_web',
    'password' => '4G4t4.u$3r',
]);

$cache = new FileSystemCacheAdapter(new FileSystemCache('tmp/cache'));
$productRepository = new ProductRepository($connection, $cache);

$products = $productRepository->allProducts();

foreach ($products as $product) {
    echo "{$product->getModel()}\n";
}
