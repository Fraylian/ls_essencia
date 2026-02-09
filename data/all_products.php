<?php
// Helper to load all products
require_once 'data/products.php';
require_once 'data/accessories.php';

// Merge arrays if they exist
$all_products = [];

if (isset($products)) {
    $all_products = $products + $all_products;
}

if (isset($accessories)) {
    $all_products = $accessories + $all_products; // Union to preserve keys
}
?>
