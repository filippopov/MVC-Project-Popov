<?php /** @var \MVC\Areas\ViewModels\ProductModels $model */?>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Type</th>
        <th>Quantity</th>
        <th>Price</th>
    </tr>
    <tr>
        <td><?=$model->getId()?></td>
        <td><?=$model->getName()?></td>
        <td><?=$model->getType()?></td>
        <td><?=$model->getQuantity()?></td>
        <td><?=number_format((double)$model->getPrice(),2);?></td>
    </tr>
</table>

<a href="buy">Buy</a>
<a href="allProducts">Cancel</a>

