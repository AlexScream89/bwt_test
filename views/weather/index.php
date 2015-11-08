<?php

if (\App\Models\Model_User::is_auth()) {
    if (!empty($result)) {
        foreach ($result as $result_data){
            echo '<h4>'.$result_data->results->channel->location->city.', ';
            echo $result_data->results->channel->location->country.'</h4>';
            echo $result_data->results->channel->item->description;
        }
    }
}
else {
    echo 'Только зарегестрированные пользователи могут видеть погоу';
}

