<?php /** @var \MVC\ViewModels\User $model */?>

<h1>Hello, <?= $model->getUsername(); ?></h1>
<h3>Your Money: <?=number_format($model->getMoney(), 2);?></h3>

<a href="edit">Edit Profile</a>
<a href="addMoney">Add Money</a>
<a href="http://localhost:8080/MVC-Project-Popov/areas/product/allProducts">Show All Products</a>
<?php
//$names =[
//    [
//        'id'=>1,
//        'name'=>"peter",
//        'email'=>'gdff'
//    ],
//    [
//        'id'=>2,
//        'name'=>"sdfsdfsdf",
//        'email'=>'dsfdsfdsfs'
//    ],
//];

// \MVC\ViewHelpers\DropDown::create()->create()
//    ->addAttribute('name', 'imena')
//     ->addAttribute('id', 'names')
//    ->addAttribute('class', 'red-menu')
//    ->setDefaultOption('--Buildings--')
//    ->setContent($names,'id','name','email','dsfdsfdsfs')
//    ->render();