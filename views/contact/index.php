<?php
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo $error.'<br>';
    }
}
?>

<form method="POST" id="message" class="form-signin" role="form" action="/contact/save">
    <h2 class="form-signin-heading">Форма отправки сообщеня</h2>
    <input type="text" name="name" class="form-control" placeholder="Name" required>
    <input type="email" name="email" class="form-control" placeholder="Email address" required>
    <textarea name="message" class="form-control" rows="5" required></textarea>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
    <div class="g-recaptcha" data-sitekey="6LemgRATAAAAAHFFRZyHZ5Vzgfq3X1uDta13VT10"></div>
</form>

<script>
    $(document).ready(function(){
        $('#message').validate({
            rules:{
                name:{
                    required: true,
                    minlength: 2,
                    maxlength: 30,
                },
                email:{
                    required: true,
                    email: true,
                },
                message:{
                    required: true,
                },
            },

            messages:{
                name:{
                    required: "Это поле обязательно для заполнения",
                    minlength: "Ваше имя должно содержать не менее 2 символов",
                    maxlength: "Ваше имя должно содержать не более 30 символов",
                },
                email:{
                    required: "Это поле обязательно для заполнения",
                    email: "Введте корректный email",
                },
                message:{
                    required: "Введите ваше сообщение",
                },
            }
        });
    })
</script>