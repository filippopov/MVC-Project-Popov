<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 10/2/2015
 * Time: 3:50 PM
 */

namespace MVC\Areas\Models;


use MVC\Core\Database;

class Product {

    public function getAll(){
        $db = Database::getInstance('app');

        $result = $db->prepare("SELECT id, name, type, price FROM products");
        $result->execute();

        return $result->fetchAll();
    }

    public function addProduct($name,$type,$price){
        $db = Database::getInstance('app');

        $result = $db->prepare("
            INSERT INTO products (name, type, price)
            VALUES (?, ?, ?);
        ");
        $result->execute(
            [
                $name,
                $type,
                $price
            ]
        );

        if ($result->rowCount() > 0) {

            header("Location: allProducts");
        }

        throw new \Exception('Cannot add product');
    }
}

