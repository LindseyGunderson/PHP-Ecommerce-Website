<?php class PageIndex {


// static page title for html
static public $title;


// header function for each page
static function header(){ ?>

<head>
		<meta charset="utf-8">
		<title> <?php echo self::$title; ?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img src="imgs/ck_logo.jpg" alt="Cozy Kaffe Logo" srcset="" width="45px"></a>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">Products</a>
                    </li>
                    </ul>

                </div>
                <div class="link-icons">
                        <a href="cart.php">
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                        </div>
        </nav>
        </header>
        <main>

<?php }

    // show all the products in their UI cards, with the associated title
    static function showProducts($productList, $title){ 

            echo '<div class="container mt-5">
            <h3 class="recent-products-title">'. $title . '</h3>
                <div class="row d-flex justify-content-center g-1">';
                foreach ($productList as $product):

                    echo '<div class="col-md-4">
                    <a href="product.php?productID='.$product->getID() .'">
                    <div class="product text-center"> <img src="imgs/'. $product->getImg() .'" width="250">
                        <div class="px-3">
                            <h5>' . $product->getName() . '</h5>
                            <h6> &dollar;' . $product->getPrice() .'</h6>
                        </div> <span class="dot-background"><span class="inner-dot"><i class="fa fa-arrow-right"></i></span></span>
                    </div>
                    </a>
                </div>';

                endforeach;    
            '</div>
        </div>';




 }



// Show the single product page
// This function will query the database and show the single product based on the product ID in the url
  static function showSingleProduct($singleProduct){

    echo '<div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="product-card">
                    <div class="row">
                    <div class="col-md-6">
                    <div> <i class="fa fa-long-arrow-left"></i> <span class="ml-1">Back</span> </div>
                        <div class="product-main-img">
                            <div class="text-center p-4"> <img src="imgs/'.$singleProduct->getImg() .'"  width="425" class="single-product-img" /> </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-details p-4">
                            <div class="mt-4 mb-4">
                                <h5 class="product-name">' . $singleProduct->GetName() . '</h5>
                                <div class="product-price"> 
                                    <span class="price">&dollar;' . $singleProduct->getPrice() . '</span>
                                </div>
                                
                            </div>
                                <p class="product-description">'. $singleProduct->getDesc() .'</p>
                                <form action="cart.php?id='.$singleProduct->getID() .'" method="POST">
                                    <input class="form-control" type="number" name="quantity" value="1" placeholder="Quantity"  readonly>
                                    <input type="hidden" name="product_id" value="'. $singleProduct->getID() .'">
                                
                            <input class="btn btn-block" type="submit" name="add" value="Add to Cart">
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>';
 }

//  This will show the header for the shopping cart with and count the number of items in the cart.
    static function shoppingCartHeader($items){

        echo'<div class="card">
        <div class="row ">
            <div class="col-md-8 cart">
                <div class="title">
                    <div class="row">
                        <div class="col">
                            <h4><b>Shopping Cart</b></h4>
                        </div>
                        <div class="col align-self-center text-right text-muted">'. count($items) . ' items</div>
                    </div>
                    <div class="row cart-titles">
                        <div class="col"><label>Product</label></div>

                        <div class="col-3"><label>Qty</label></div>

                        <div class="col-3"><label>Price</label></div>
                        
                    </div>
                </div>';

    }

    // Show each item that is in the shopping cart with their quantity and calculate the total
    static function showShoppingCart($cartItem, $qty){

        echo '<div class="row">
            <div class="row border-top border-bottom">
                <div class="row main align-items-center">
                    <div class="col">
                    <a href="product.php?productID='. $cartItem->getID() .'"><img class="img-fluid shoppingCart-img" src="imgs/'.$cartItem->getImg() . '"></a></div>
                    <div class="col">
                        <div class="row"><a href="product.php?productID='. $cartItem->getID() .'">'. $cartItem->getName() . '</a></div>
                    </div>
                        <div class="col-3">'. $qty . '</div>
                        <div class="col-3">&dollar; '. $cartItem->getPrice().'</div>
                </div>
            </div>
               
        </div>';
    }


    // This will calculate the final total, and taxes for all the items in the shopping cart
    static function shoppingCartCheckout($subtotal) {

    echo '<div class="checkout-action-btns">
            <form action="" method="POST">
                <input class="btn" type="submit" value="Continue Shopping" name="continueShopping" id="continueShopping">
                <input class="btn empty-cart" type="submit" value="Empty Cart" name="reset" id="reset" />
              </form>
            </div>
        </div>
        <div class="col-md-4 summary">
            <div>
                <h5><b>Order Summary</b></h5>
            </div>
            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                <div class="col">Total </div>
                <div class="col text-right">&dollar; '. $subtotal .'</div>
            </div>
            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                <div class="col">Tax</div>
                <div class="col text-right">&dollar; '. round($subtotal * 0.12, 0, PHP_ROUND_HALF_UP) .'</div>
            </div>
            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                <div class="col">Order Total </div>
                <div class="col text-right">&dollar; '. round($subtotal * 1.12, 2) .'</div>
            </div> 
            <button class="btn" value="Place Order" name="placeorder">Place Order</button>
        </div>
    </div>';

    }

    // Displays an empty shopping cart when no items are in or the user clears their cart
    static function emptyShoppingCart($subtotal) {

        echo '<div class="card">
        <div class="row ">
            <div class="col-md-8 cart">
                <div class="title">
                    <div class="row">
                        <div class="col">
                            <h4><b>Shopping Cart</b></h4>
                        </div>
                        <div class="col align-self-center text-right text-muted">0 items</div>
                    </div>
                </div>
        
        <div class="row border-top border-bottom">
            <div>
               <h5 class="empty-cart-text"> You have no items in your shopping cart </h5>
            </div>     
    </div>
        <div class="checkout-action-btns">
                <form action="" method="POST">
                    <input class="btn" type="submit" value="Continue Shopping" name="continueShopping" id="continueShopping">
                </form>
                </div>
            </div>
            <div class="col-md-4 summary">
                <div>
                    <h5><b>Order Summary</b></h5>
                </div>
                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                    <div class="col">Total </div>
                    <div class="col text-right">&dollar; '. $subtotal .'</div>
                </div>
                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                    <div class="col">Tax</div>
                    <div class="col text-right">&dollar; '. round($subtotal * 0.12, 0, PHP_ROUND_HALF_UP) .'</div>
                </div>
                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                    <div class="col">Order Total</div>
                    <div class="col text-right">&dollar; '. round($subtotal * 1.12, 2) .'</div>
                </div> 
                <button disabled="true" class="empty-checkout-disabled-btn" value="Place Order" name="placeorder">Place Order</button>
            </div>
        </div>';

    }



    // Shows the order details for the shopping cart
    static function showTotalPrice($subtotal) {

        echo '</tbody>
        </table>
        <div class="checkout-total">
                  <span class="text">Subtotal</span>
                  <span class="product-subtotal">&dollar;'. $subtotal .'</span>
             
              <div class="checkout-buttons">
              <form action="cart.php?reset" method="GET">
                  <input class="btn checkout-btn" type="submit" value="Empty Cart" name="reset" id="reset" />
              </form>
                  <input class="btn checkout-btn" type="submit" value="Place Order" name="placeorder">
              </div>
          </form>
          </div>';

    }

    // footer for the bottom of the page
    static function footer(){ ?>
        </div>
        <footer>
          <strong><h4></h4></strong>
         
        </footer >
      </body>
    </html>

<?php    }


}

?>

