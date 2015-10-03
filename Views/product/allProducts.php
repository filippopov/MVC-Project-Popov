<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<?php /** @var \MVC\Areas\ViewModels\ProductModels[] $model */?>

<?php


\MVC\ViewHelpers\GenerateTable::create()->create()
    ->addAttribute('id', 'names')
    ->addAttribute('class', 'red-menu')
    ->addAttribute('border','1px')
    ->setHeaders(['Id','Name','Type','Quantity', 'Price'])
    ->setContent($model)
    ->render();

?>
<form action="http://localhost:8080/MVC-Project-Popov/areas/product/addToCart" method="post">
    <input type="text" name="product-id" placeholder="Enter Product Id"/>
    <input type="submit" name="submit" value="submit"/>
</form>



<a href="addProduct">Add Product</a>
<a href="http://localhost:8080/MVC-Project-Popov/users/profile/">Go to Profile</a>
<!--<script>-->
<!--     $("a").click(function(event){-->
<!--         alert(event.target.id);-->
<!--     })-->
<!--</script>-->




