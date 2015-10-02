<?php /** @var \MVC\Areas\ViewModels\ProductModels[] $model */?>

<form method="post">
    <div>
        <input type="text" id="name" name="name" placeholder="Name"/>
        <input type="text" id="type" name="type" placeholder="Type" />
        <input type="text" id="price" name="price" placeholder="Price" />
        <input type="submit" name="submit"/>
    </div>
</form>
<a href="allProducts">Back to all products</a>

<?php if(isset($model->error)): ?>
    <h2>An error occurred</h2>
<?php elseif(isset($model->success)): ?>
    <h2>Successfully edit Profile</h2>
<?php endif; ?>