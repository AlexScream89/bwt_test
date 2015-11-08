<?php
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo $error.'<br>';
    }
}
?>

<form method="POST" id="login" class="form-signin" role="form" action="/auth/enter">
    <h2 class="form-signin-heading">Вход на сайт</h2>
    <input type="email" name="email" class="form-control" placeholder="Email address" required>
    <input type="password" name="password" class="form-control" placeholder="Password" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
</form>

<script>
    $(document).ready(function(){
        $('#login').validate({
            rules:{
                email:{
                    required: true,
                    email: true,
                },
                password:{
                    required: true,
                },
            },

            messages:{
                email:{
                    required: "Введите email",
                    email: "Введите корректный email",
                },
                password:{
                    required: "Введите пароль",
                },
            }
        });
    })
</script>