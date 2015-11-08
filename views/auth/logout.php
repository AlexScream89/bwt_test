<?php

unset($_SESSION['user']);
session_destroy();
header('Location:'.$_SERVER["HTTP_REFERER"]);
die;
