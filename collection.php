<?php
use Examples\Collection;

require 'autoload.php';

$collection = new Collection(['Uno', 'Dos', 'Tres']);

foreach ($collection as $item) {
    echo "\n$item";
}
echo $collection[1];
echo $collection->count();
