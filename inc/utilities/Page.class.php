<!-- This is a utility class that will hold all the html elements for each page -->

<?php class PageIndex {


// title for each page
static public $title;


// header function that will appear on every page
static function header(){ ?>

<head>
		<meta charset="utf-8">
		<title>$title</title>
		<!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
        <header>
            <div class="content-wrapper">
                <h1>Ecommerce Website</h1>
                <nav>
                    <a href="index.php">Home</a>
                    <a href="products.php">Products</a>
                </nav>
                <div class="link-icons">
                    <a href="cart.php">
						<i class="fas fa-shopping-cart"></i>
					</a>
                </div>
            </div>
        </header>
        <main>

<?php }


// show all products on the homepage
    static function showProducts($productList){ 

      // https://picsum.photos/


      echo '<div class="products content-wrapper">
          <h1>Products</h1>
          <p>' . count($productList). ' Products</p>
          <div class="products-wrapper">';
               foreach ($productList as $product): 
             echo '<a href="product.php?productID='.$product->getID() .'" class="product">
                  <img src="https://picsum.photos/200/200" alt="">
                  <span class="name">' .$product->getName() .'</span>
                  <span class="price">
                      &dollar;' . $product->getPrice() .'
                  </span>
              </a>';
              endforeach;
        echo  '</div>
      </div>';

 }



//  show single products on product page
  static function showSingleProduct($singleProduct){

    echo '<div class="product content-wrapper">
      <img src="https://picsum.photos/500/500" alt="">
      <div>
          <h1 class="name">' . $singleProduct->GetName() . '</h1>
        <span class="price">
            &dollar;' . $singleProduct->getPrice() . '
        </span>
        <form action="cart.php?id='.$singleProduct->getID() .'" method="POST">
            <input type="number" name="quantity" value="1" min="1" placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="'. $singleProduct->getID() .'">
            <input type="submit" name="add" value="Add to Cart">
        </form>
        <div class="description">'.
            $singleProduct->getDesc() . '
        </div>
    </div>
</div>';


 }

    // show header for shopping cart section
    static function shoppingCartHeader(){

        echo '<div class="cart content-wrapper">
        <h1>Shopping Cart</h1>
        <form action="" method="POST">
            <table>
                <thead>
                    <tr>
                        <td colspan="2">Product</td>
                        <td >Price</td>
                        <td >Quantity</td>
                        <td>Total</td>
                    </tr>
                </thead>';
    }


    // show all items in the users shopping cart
    static function showShoppingCart($cartItem, $qty){


        echo '
                <tbody>
                    <tr>
                        <td class="img">
                            <a href="product.php?productID='. $cartItem->getID() .'">
                                <img src="https://picsum.photos/200/200" width="50" height="50" alt="'. $cartItem->getName().'">
                            </a>
                        </td>
                        <td>
                        <a href="product.php?productID='. $cartItem->getID() .'">'.$cartItem->getName().'</a>
                            <br>
                        </td>
                        <td class="price">&dollar;'. $cartItem->getPrice() .'</td>
                        <td class="quantity">
                        <input type="number" name="quantity-id" value="'. $qty .'" placeholder="Quantity" required>
                        </td>
                        <td class="total">&dollar;'. $qty * $cartItem->getPrice() .'</td>
                    </tr>'
                ;

    }

    // Show the total for all the items int he cart
    static function showTotalPrice($subtotal) {

        echo '</tbody>
        </table>
        <div class="subtotal">
                  <span class="text">Subtotal</span>
                  <span class="price">&dollar;'. $subtotal .'</span>
              </div>
              <div class="buttons">
              <form action="cart.php?reset" method="GET">
                  <input type="submit" value="RESET CART" name="reset" id="reset" />
              </form>
                  <input type="submit" value="Update" name="update">
                  <input type="submit" value="Place Order" name="placeorder">
              </div>
          </form>';

    }

    // show empty cart when there are no items in the cart
    static function showEmptyCart() {

        echo '<div class="cart content-wrapper">
        <h1>Shopping Cart</h1>
        
            <table>
                <thead>
                    <tr>
                        <td colspan="2">Product</td>
                        <td colspan="2">Price</td>
                        <td>Total</td>
                    </tr>
                </thead> 
                <tbody>
        <tr>
            <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
        </tr>
        </tbody>';
    }

    // footer
    static function footer(){ ?>
        </div>
        <footer>
         
         
        </footer >
      </body>
    </html>

<?php    }


}

?>

