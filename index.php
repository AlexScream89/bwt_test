<?php
session_start();

error_reporting (E_ALL);

include ('config.php');

require 'vendor/autoload.php';

$router = new \App\Classes\Router();
$router->setPath (SITE_PATH . 'App' . DS . 'Controllers');
$router->start();
