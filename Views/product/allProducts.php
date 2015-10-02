<?php /** @var \MVC\Areas\ViewModels\ProductModels[] $model */?>

<?php


\MVC\ViewHelpers\GenerateTable::create()->create()
    ->addAttribute('id', 'names')
    ->addAttribute('class', 'red-menu')
    ->setHeaders(['Id','Name','Type', 'Price'])
    ->setContent($model)
    ->render();

?>

<a href="addProduct">Add Product</a>
<a href="http://localhost:8080/MVC-Project-Popov/users/profile/">Go to Profile</a>
