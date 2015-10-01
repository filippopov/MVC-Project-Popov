
<h1>Edit Profile</h1>

<form method="post">
    <div>
        <input type="text" name="username" value="<?=$model->getUsername();?>" />
        <input type="password" name="password" />
        <input type="password" name="confirm" />
        <input type="submit" name="edit" value="Edit" />
    </div>
</form>

<?php if(isset($model->error)): ?>
    <h2>An error occurred</h2>
<?php elseif(isset($model->success)): ?>
    <h2>Successfully add money to creditCard</h2>
<?php endif; ?>

<a href="profile">Back to profile</a>