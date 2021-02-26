<?php class PageIndex {

static public $title;

static function header(){ ?>

<head>
		<meta charset="utf-8">
		<title>$title</title>
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
                <a class="navbar-brand" href="index.php">Ecommerce Website</a>

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


    static function showProducts($productList){ 

      echo '<div class="recently-added-products">
                <h1>Recently Added Products</h1>
            </div>
            <p>' . count($productList). ' Products</p>
           <div class="containter col-lg-3 mb-4">';
               foreach ($productList as $product): 

             echo '
                        <a href="product.php?productID='.$product->getID() .'">
                        <div><img src="https://picsum.photos/200/200" alt="">
                            <span class="name">' .$product->getName() .'</span>
                            <span class="price">
                                &dollar;' . $product->getPrice() .'
                            </span>
                            </div>
                        </a>
                    
                    ';
              endforeach;
        echo '</div>';

 }




  static function showSingleProduct($singleProduct){

    echo '<div class="product-wrapper">
      <img src="https://picsum.photos/500/500" alt="">
      <div class="single-product-details">
          <h1 class="product-name">' . $singleProduct->GetName() . '</h1>
        <span class="price">
            &dollar;' . $singleProduct->getPrice() . '
        </span>
            <div class="product-description">'.
            $singleProduct->getDesc() . '
            </div>
        <form action="cart.php?id='.$singleProduct->getID() .'" method="POST">
            <input class="form-control" type="number" name="quantity" value="1" min="1" placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="'. $singleProduct->getID() .'">
            <div class="product-btn">
            <input class="btn btn-block" type="submit" name="add" value="Add to Cart">
            </div>
        </form>
       
    </div>
</div>';


 }

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
    static function showShoppingCart($cartItem, $qty){

        echo '<div class="row">
            <div class="row border-top border-bottom">
                <div class="row main align-items-center">
                    <div class="col">
                    <a href="product.php?productID='. $cartItem->getID() .'"><img class="img-fluid shoppingCart-img" src="https://picsum.photos/200/200"></a></div>
                    <div class="col">
                        <div class="row"><a href="product.php?productID='. $cartItem->getID() .'">'. $cartItem->getName() . '</a></div>
                    </div>
                        <div class="col-3">'. $qty . '</div>
                        <div class="col-3">&dollar; '. $cartItem->getPrice().'</div>
                </div>
            </div>
               
        </div>';
    }


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


    static function footer(){ ?>
        </div>
        <footer>
          <strong><h4>The Footer</h4></strong>
         
        </footer >
      </body>
    </html>

<?php    }


}

?>

