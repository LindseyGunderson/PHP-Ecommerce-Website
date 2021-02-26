<?php

require_once('inc/config.inc.php');

// entity classes
require_once('inc/entities/Products.class.php');
require_once('inc/entities/ProductMapper.class.php');

// utilitity classes
include_once('inc/utilities/PDOAgent.class.php');
require_once('inc/utilities/Page.class.php');

// set the title for the page
PageIndex::$title = "Product Descriptions";

// display the header for the page
PageIndex::header();

// initialize the connection to the database
ProductMapper::initialize("Products");

// Check if there is a $_GET request
if (isset($_GET['productID'])) {

    // Get the product based on the ID from the $_GET request
    $product = ProductMapper::getSingleProduct($_GET["productID"]);


    // if there is no product with that ID
    if (!$product) {

        // Simple error to display if the id for the product doesn't exists
        exit('Sorry, the product you are looking for does not exist!');

    }else {

        // Show the details for that product
        PageIndex::showSingleProduct($product);
    }

} 
else {

    // Simple error to display if the id wasn't specified
    exit('Product does not exist!');

}


?>