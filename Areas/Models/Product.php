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

        $result = $db->prepare("SELECT id, name, type,quantity, price FROM products");
        $result->execute();

        return $result->fetchAll();
    }

    public function addProduct($name,$type,$quantity, $price){
        $db = Database::getInstance('app');

        $result = $db->prepare("
            INSERT INTO products (name, type, quantity , price)
            VALUES (?, ?, ?,?);
        ");
        $result->execute(
            [
                $name,
                $type,
                $quantity,
                $price
            ]
        );

        if ($result->rowCount() > 0) {

            header("Location: allProducts");
        }

        throw new \Exception('Cannot add product');
    }

    public function takeProduct($id){
        $db = Database::getInstance('app');

        $result = $db->prepare("SELECT id, name, type,quantity, price FROM products WHERE id=?");
        $result->execute([ $id ]);

        return $result->fetch();
    }

    public function buy($userId,$productId){
        $db = Database::getInstance('app');

        $userResult = $db->prepare("SELECT money FROM users WHERE id=?");
        $userResult->execute([$userId]);
        $productQuantity = $db->prepare("SELECT quantity,price FROM products WHERE id=?");
        $productQuantity->execute([$productId]);
        $user = $userResult->fetch();
        $product = $productQuantity->fetch();
        var_dump($user);
        var_dump($product['price']);
        $newSum = $user['money']-$product['price'];
        $updateUserMoney = $db->prepare("UPDATE users SET money = ? WHERE id = ?");
        $updateUserMoney->execute([$newSum,$_SESSION['id']]);
        $updateQuantity= $db->prepare("UPDATE products SET quantity = ? WHERE id = ?");
        $updateQuantity->execute([$product['quantity']-1, $productId]);
        header("Location: allProducts");
    }
}

