<!--<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>-->
<h1>Edit Profile</h1>

<form method="post">
    <div>
        <input type="text" id="username" name="username" value="<?=$model->getUsername();?>" />
        <input type="password" id="password" name="password" />
        <input type="password" id="confirm" name="confirm" />
        <button id="edit" name="edit" value="Edit">Edit</button>
    </div>
</form>

<!--
->method("Post")
->setController("user")
->setAction("edit")
->loadOn("#counter")
-->

<!--<input type="submit" name="edit" value="Edit" />-->
<!--<a href="" name="edit" id="edit">Edit</a>-->
<!--<div id="content"></div>-->
<!---->
<!--<script>-->
<!--    $("#edit").click(function(){-->
<!--//        e.preventDefault();-->
<!--        $.ejax({-->
<!--            "url":'http://localhost:8080/MVC-Project-Popov/users/edit',-->
<!--            method:"POST",-->
<!--            data:{-->
<!--                edit:1,-->
<!--                username: $("#username").val(),-->
<!--                password: $("#password").val(),-->
<!--                confirm: $("#confirm").val()-->
<!--            }.done(function(data){-->
<!--                    $('#content').text(data);-->
<!--            })-->
<!---->
<!--        })-->
<!--    })-->
<!--</script>-->



<?php if(isset($model->error)): ?>
    <h2>An error occurred</h2>
<?php elseif(isset($model->success)): ?>
    <h2>Successfully edit Profile</h2>
<?php endif; ?>

<a href="profile">Back to profile</a>



