<?= $model->error ? $model->error : '' ;?>

<form action="" method="post">
    <input type="text" name="username" />
    <input type="password" name="password" />
    <input type="submit" value="Register" />
</form>

<a href="http://localhost:8080/MVC-Project-Popov/users/login">Login</a>