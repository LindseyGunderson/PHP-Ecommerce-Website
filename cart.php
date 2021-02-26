<?php
require_once('inc/config.inc.php');

// entity classes
require_once('inc/entities/Products.class.php');
require_once('inc/entities/ProductMapper.class.php');

// utilitity classes
include_once('inc/utilities/PDOAgent.class.php');
require_once('inc/utilities/Page.class.php');

// start the session
session_start();

// display the header for the page
PageIndex::header();

// if the empty cart button is clicked
if(isset($_POST['reset'])) {

  // unset the session and destroy it
  // shopping cart will be emptied
    unset($_SESSION['shoppingcart']);
    session_destroy();
    
  }

  // if the "continue shopping" button is clicked
  if(isset($_POST['continueShopping'])){

    // relocate the user to products page.
    header('Location: products.php');

  }



  // check if the add to cart button was clicked
    if(isset($_POST['add']) && isset($_GET['id'])) {


        // Check if there is a session for the cart set already
        if(!isset($_SESSION['shoppingcart'])) {
            
            $_SESSION['shoppingcart'] = [];

        }

        // get the id and quantitiy information passed from the add button
        $id = $_GET['id'];
        $quantity = $_POST['quantity'];
    
        $item = [
            "id"       => $id,
            "quantity" => $quantity
        ];
    
        // Now add new item to the cart
        array_push($_SESSION['shoppingcart'], $item);
 
    } 

    // if there is a session started and there are items in the session
    if(isset($_SESSION['shoppingcart']) && count($_SESSION['shoppingcart']) != 0) {

      // initial the connection to the database
      ProductMapper::initialize('Products');

      // store the session in an array
      $list = $_SESSION['shoppingcart'];

      // show the shopping cart header
      PageIndex::shoppingCartHeader($list);
     
      // declare the subtotal value for the items
      $subtotal = 0;

      // loop through each item in the shopping cart session
      foreach($list as $item) {

        // declare the id and quantity for each item
        $id = $item['id'];
        $qty = $item['quantity'];

          // based on the id's from the list, query those items from the databse
          $cart = ProductMapper::getSingleProduct($id);
    
          // show the product details and their quantity
          PageIndex::showShoppingCart($cart, $item['quantity']);

          // start a running total of the number of items and prices
          $subtotal += Products::totalCost($qty, $cart->getPrice());
            
        }

        // show the checkout options
        PageIndex::shoppingCartCheckout($subtotal);

    } else {

      // there are no items in the cart, show an empty cart
      PageIndex::emptyShoppingCart(0);

    }



?>