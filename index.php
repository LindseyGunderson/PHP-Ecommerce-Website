<?php

// require database configurations
require_once('inc/config.inc.php');

// entity classes
require_once('inc/entities/Products.class.php');
require_once('inc/entities/ProductMapper.class.php');

// utilitity classes
include_once('inc/utilities/PDOAgent.class.php');
require_once('inc/utilities/Page.class.php');

    // Set the title of the homepage
    PageIndex::$title = "Cozy Kaffe Homepage";

    // display the header
    PageIndex::header();

    // initialize the connection to the database
    ProductMapper::initialize("Products");

    // Display "recently" added products
    // This will show 3 random products each time the page is loaded from the database
    $products = ProductMapper::getRecentlyAddedProducts();

    // Display all the products and heading text for the page
    PageIndex::showProducts($products, "Recently Added Products");


    // include the footer
    PageIndex::footer();

?>

