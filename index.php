<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Sielo/Application/Autoloader.php';

$router = new \Core\UrlRouter\Router($_GET['url']);

$router->get('/theme/listing', function () { $themeListing = new \Application\Site\Controller\ThemeGallery();$themeListing->invokeListing(); });
$router->get('/theme/view/:name', function ($name) { $name = str_replace('-', ' ', $name); $themeListing = new \Application\Site\Controller\ThemeGallery();$themeListing->invokeThemePage($name); });
$router->get('/user/listing', function () {});
$router->get('/user/view/:name', function ($name) { $name = str_replace('-', ' ', $name); $userAccount = new \Application\Site\Controller\User();$userAccount->invokeViewAccountPage($name); });
$router->get('/user/register', function () { $userAccount = new \Application\Site\Controller\User();$userAccount->invokeLoginPage(); });
$router->post('user/register', function() { print_r($_POST); });

$router->run();