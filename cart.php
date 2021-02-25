<?php
require_once('inc/config.inc.php');

// entity classes
require_once('inc/entities/Products.class.php');
require_once('inc/entities/ProductMapper.class.php');

// utilitity classes
include_once('inc/utilities/PDOAgent.class.php');
require_once('inc/utilities/Page.class.php');

session_start();

PageIndex::header();

if(isset($_POST['reset'])) {


    unset($_SESSION['shoppingcart']);
    session_destroy();
    
  }

if(isset($_POST['continueShopping'])){

  header('Location: index.php');

}



  // Check if the add to cart button was clicked or someone just wants to load this page. This POST method `add` is from the id of the add to cart button on the detail page.
    if(isset($_POST['add']) && isset($_GET['id'])) {

        // Check if there is a session for the cart set already, if not then set one.
        if(!isset($_SESSION['shoppingcart'])) {
            
            $_SESSION['shoppingcart'] = [];

        }


        $id = $_GET['id'];
        $quantity = $_POST['quantity'];
    
        $item = [
            "id"       => $id,
            "quantity" => $quantity
        ];
    
        // Now add new item to the cart
        array_push($_SESSION['shoppingcart'], $item);
 
    } 


    if(isset($_SESSION['shoppingcart']) && count($_SESSION['shoppingcart']) != 0) {

      ProductMapper::initialize('Products');

      $list = $_SESSION['shoppingcart'];

      PageIndex::shoppingCartHeader($list);
     
      $subtotal = 0;




      foreach($list as $item) {

        $id = $item['id'];

        $qty = $item['quantity'];

        
          $cart = ProductMapper::getSingleProduct($id);
    

          PageIndex::showShoppingCart($cart, $item['quantity']);
          // Now let's print out this item to HTML


          $subtotal += Products::totalCost($qty, $cart->getPrice());
            
        }

        PageIndex::shoppingCartCheckout($subtotal);

    } else {

      PageIndex::emptyShoppingCart(0);

    }



?>