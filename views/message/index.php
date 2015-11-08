<h2>Сообщения пользователей</h2>
<?php
if (\App\Models\Model_User::is_auth()) {
    if (!empty($messages)){
        foreach ($messages as $message) {
            echo '<h4>'.$message['name'].'</h4>';
            echo $message['message'].'<hr>';
        }

    }
}
else {
    echo 'Сообщения могут видеть только зарегестрированные пользователи!';
}

