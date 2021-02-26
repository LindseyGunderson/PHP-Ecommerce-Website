<?php

// This class will handle all the database queries for the products

class ProductMapper {

        private static $db;
    
    static function initialize(string $className){
    
        self::$db = new PDOAgent($className);
    }


    // get all products
    static function getProducts() : array {

        $selectAll = "SELECT * FROM Products";
    
        self::$db->query($selectAll);
    
        self::$db->execute();
    
        return self::$db->resultSet();
    }


        // get all products w/ limit for front page
        static function getRecentlyAddedProducts() : array{

            $selectAll = "SELECT * FROM Products ORDER BY RAND() LIMIT 3";
        
            self::$db->query($selectAll);
        
            self::$db->execute();
        
            return self::$db->resultSet();
        }
    

    // get single product based on ID when selected
    static function getSingleProduct($id) {

        $selectOne = "SELECT * FROM products
        WHERE id = :id";

        self::$db->query($selectOne);
        self::$db->bind(":id", $id);
        self::$db->execute();

        return self::$db->singleResult();
        
    }
    
        // get single product based on ID when selected
        static function getCartItems($id) {

            $selectALL = "SELECT * FROM products
            WHERE id = :id";   
            self::$db->query($selectALL);
            self::$db->bind(":id", $id);
            self::$db->execute();
    
            return self::$db->resultSet();
            
        }

}



?>