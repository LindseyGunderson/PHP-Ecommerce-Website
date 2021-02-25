<?php

// require the database configurations
require_once('inc/config.inc.php');

// entity classes
require_once('inc/entities/Products.class.php');
require_once('inc/entities/ProductMapper.class.php');

// utilitity classes
include_once('inc/utilities/PDOAgent.class.php');
require_once('inc/utilities/Page.class.php');

    // title for the index page
    PageIndex::$title = "";

    // header for the index page
    PageIndex::header();

    // Initialize the connection to the database to access the product list
    ProductMapper::initialize("Products");

    // query the products from the database
    $products = ProductMapper::getRecentlyAddedProducts();

    // show all the products in a list from the query
    // This will show a limited amount of products
    PageIndex::showProducts($products);

    // include the footer
    PageIndex::footer();

?>

