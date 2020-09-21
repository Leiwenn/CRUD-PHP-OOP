<?php

require 'vendor/autoload.php'; 
require 'config/Router.php';

session_start();

$router = new \p4\blog\config\Router();
$router->router();