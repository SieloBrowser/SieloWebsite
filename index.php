<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Sielo/Application/Autoloader.php';

$router = new \Core\UrlRouter\Router((isset($_GET['url'])) ? $_GET['url'] : '');

$router->get('/', function () { $home = new \Application\Site\Controller\Home();$home->invokeHomePage(); });
/*
 * Theme listing
 */
$router->get('/theme/listing', function () { $themeListing = new \Application\Site\Controller\ThemeGallery();$themeListing->invokeListing(); });
$router->get('/theme/view/:name', function ($name) { $name = str_replace('-', ' ', $name); $themeListing = new \Application\Site\Controller\ThemeGallery();$themeListing->invokeThemePage($name); });
/*
 * User listing
 */
$router->get('/user/listing', function () {});
$router->get('/account/:name', function ($name) { $name = str_replace('-', ' ', $name); $userAccount = new \Application\Site\Controller\User();$userAccount->invokeViewAccountPage($name); });
/*
 * Login & Register
 */
$router->get('/join', function () { $userAccount = new \Application\Site\Controller\User();$userAccount->invokeJoinPage(); });
$router->post('/join/login', function() { print_r($_POST); });
$router->post('/join/register', function() { $userController = new Application\Site\Controller\User();$userController->createAccount($_POST); });


/*
 * Run
 */
$router->run();