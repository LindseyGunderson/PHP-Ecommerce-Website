<?php

// include the database connection
require_once('inc/config.inc.php');

// entity classes
require_once('inc/entities/Products.class.php');
require_once('inc/entities/ProductMapper.class.php');

// utilitity classes
include_once('inc/utilities/PDOAgent.class.php');
require_once('inc/utilities/Page.class.php');

    // title for products page
    PageIndex::$title = "";

    // header for products page
    PageIndex::header();

    // initialize the database connections to the products
    ProductMapper::initialize("Products");
    
    // query all the products for the product page
    $products = ProductMapper::getProducts();

    // show the relative information about each product
    PageIndex::showProducts($products);

    // include the footer
    PageIndex::footer();

?>

