<?php

// class for all our products
class Products {

    // properties for the products
    private $id;
    private $name;
    private $description;
    private $price;
    private $img;


    // getters for the products
    public function getID() : int {

        return $this->id;
   
    }

    public function getName() : String {

        return $this->name;

    }

    public function getDesc() : String {

        return $this->description;

    }

    public function getPrice() {

        return $this->price;

    }

    public function getImg() : String {

        return $this->img;
    }


    //total cost when the products are in the cart.
    static function totalCost($qty, $price){

        $total = $qty * $price;

       return $total;

     }

}



?>