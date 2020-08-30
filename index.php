<?php

//mettre index dans public
//define('ROOT', dirname(__DIR__));

require 'vendor/autoload.php'; 

require 'config/Router.php';

session_start();

$router = new \p4\blog\config\Router();
$router->router();