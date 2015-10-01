<h1>Add Money To CreditCard</h1>

<form method="post">
    <div>
        <input type="text" name="sum" placeholder="Enter sum" />
        <input type="text" name="confirm-sum" placeholder="Confirm sum" />
        <input type="submit" name="add" value="Add-Money" />
    </div>
</form>

<?php if(isset($model->error)): ?>
    <h2>An error occurred</h2>
<?php elseif(isset($model->success)): ?>
    <h2>Successfully Add Money to CreditCard</h2>
<?php endif; ?>

<a href="profile">Back to profile</a>