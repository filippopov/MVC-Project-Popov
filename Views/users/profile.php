<?php /** @var \MVC\ViewModels\User $model */?>

<h1>Hello, <?= $model->getUsername(); ?></h1>
<h3>Your Money: <?=number_format($model->getMoney(), 2);?></h3>

<a href="http://localhost:8080/MVC-Project-Popov/users/edit">Edit Profile</a>
<a href="http://localhost:8080/MVC-Project-Popov/users/addMoney">Add Money</a>
<a href="http://localhost:8080/MVC-Project-Popov/areas/product/allProducts">Show All Products</a>

