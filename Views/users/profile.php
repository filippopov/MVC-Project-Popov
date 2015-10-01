<?php /** @var \MVC\ViewModels\User $model */?>

<h1>Hello, <?= $model->getUsername(); ?></h1>
<h3>Your Money: <?=number_format($model->getMoney(), 2);?></h3>

<a href="edit">Edit Profile</a>
<a href="addMoney">Add Money</a>

