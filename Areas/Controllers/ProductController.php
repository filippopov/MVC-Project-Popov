<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 10/2/2015
 * Time: 12:46 PM
 */

namespace MVC\Areas\Controllers;


use MVC\Areas\Models\Product;
use MVC\Areas\ViewModels\ProductInformation;
use MVC\Areas\ViewModels\ProductModel;
use MVC\Controllers\Controller;
use MVC\Core\Database;
use MVC\View;


class ProductController extends Controller
{
    public function proba(){

        $viewModel = new Product();

        $viewModel->getAll();
        return new View($viewModel);
    }

    public function allProducts()
    {
        $productModel = new Product();

        $productInfo = $productModel->getAll();
        $userViewModel=[];
        foreach($productInfo as $model){
            $userViewModel[] = new ProductModel(
                $model['id'],
                $model['name'],
                $model['price'],
                $model['type']

            );
        }




        $this->escapeAll($userViewModel);

        return new View($userViewModel);
    }

    public function addProduct(){
        $viewModel = new ProductInformation();

        if (isset($_POST['name'], $_POST['type'], $_POST['price'])) {
            try {
                $name = $_POST['name'];
                $type = $_POST['type'];
                $price = $_POST['price'];

                $userModel = new Product();
                $userModel->addProduct($name,$type,$price);
                return new View($userModel);
            } catch (\Exception $e) {
                $viewModel->error = $e->getMessage();
                return new View($viewModel);
            }
        }

        return new View();
    }

    public function addToCart(){

    }
} 