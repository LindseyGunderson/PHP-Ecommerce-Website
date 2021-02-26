<?php
require_once('inc/config.inc.php');

// entity classes
require_once('inc/entities/Products.class.php');
require_once('inc/entities/ProductMapper.class.php');

// utilitity classes
include_once('inc/utilities/PDOAgent.class.php');
require_once('inc/utilities/Page.class.php');

    // set the title for the page
    PageIndex::$title = "All Products";

    // show the header for the page
    PageIndex::header();

    // initialize the connection to the database
    ProductMapper::initialize("Products");

    // query all the products from the database
    $products = ProductMapper::getProducts();

    // show all products that are in the database and display the header
    PageIndex::showProducts($products, "All Products");

    // include the footer
    PageIndex::footer();

?>

