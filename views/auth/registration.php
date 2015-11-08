<?php
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo $error.'<br>';
    }
}
?>

<form method="POST" id="registration" class="form-signin" role="form" action="/auth/save_user">
    <h2 class="form-signin-heading">Форма регистрации</h2>
    <input type="text" name="name" class="form-control" placeholder="Имя" required autofocus>
    <input type="text" name="surname" class="form-control" placeholder="Фамилия" required>
     <input type="email" name="email" class="form-control" placeholder="Email address" required>
     <input type="password" name="password" class="form-control" placeholder="Password" required>
     <select name="gender" class="form-control">
         <option value="1">Мужской</option>
         <option value="2">Женский</option>
     </select>
    <input type="text" name="dob" id="datepicker" class="form-control" placeholder="Date of bith">
    <button class="btn btn-lg btn-primary btn-block" type="submit">Зарегистрироваться</button>
</form>
<script>
    $(document).ready(function() {
        $( "#datepicker" ).datepicker({
            changeMonth: true,
            changeYear: true
        });
    $('#registration').validate({
        rules:{
            name:{
                required: true,
                minlength: 2,
                maxlength: 32,
            },
            surname:{
                required: true,
                minlength: 2,
                maxlength: 32,
            },
            email:{
                required: true,
                email: true,
            },
            password:{
                required: true,
                minlength: 6,
            },
            dob:{
                date : true,
            }
        },

        messages:{
            name:{
                required: "Это поле обязательно для заполнения",
                minlength: "Ваше имя должно содержать не менее 2 символов",
                maxlength: "Ваше имя должно содержать не более 32 символов",
            },
            surname:{
                required: "Это поле обязательно для заполнения",
                minlength: "Ваша фамилия должна содержать не менее 2 символов",
                maxlength: "Ваша фамилия должна содержать не более 32 символов",
            },
            email:{
                required: "Это поле обязательно для заполнения",
                email: "Введте корректный email",
            },
            password:{
                required: "Это поле обязательно для заполнения",
                minlength: "Ваш пароль должен содержать не менее 6 символов",
            },
            dob:{
                date : "Введите корректную дату рождения",
            }
        }
    });
    });
</script>
