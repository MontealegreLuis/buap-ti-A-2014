<?php
$dsn = 'mysql:host=localhost;dbname=admin_agata';
$user = 'agata_web';
$password = '4G4t4.u$3r';
$connection = new PDO($dsn, $user, $password);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$connection->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET names utf8');

$sql = <<<QUERY
SELECT *
FROM product p
    INNER JOIN category c
      ON  p.categoryId = c.id
WHERE c.id = :categoryId
QUERY;

try {
    $statement = $connection->prepare($sql);
    $statement->execute([':categoryId' => 1]);
    echo $statement->rowCount();
    $rowset = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rowset as $product) {
        echo "\n{$product['model']}";
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
