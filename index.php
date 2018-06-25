<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Sielo/Application/Autoloader.php';

$router = new \Core\UrlRouter\Router((isset($_GET['url'])) ? $_GET['url'] : '');

$router->get('/', function () { echo 'ok'; });
/*
 * Theme listing
 */
$router->get('/theme/listing', function () { $themeListing = new \Application\Site\Controller\ThemeGallery();$themeListing->invokeListing(); });
$router->get('/theme/view/:name', function ($name) { $name = str_replace('-', ' ', $name); $themeListing = new \Application\Site\Controller\ThemeGallery();$themeListing->invokeThemePage($name); });
/*
 * User listing
 */
$router->get('/user/listing', function () {});
$router->get('/user/view/:name', function ($name) { $name = str_replace('-', ' ', $name); $userAccount = new \Application\Site\Controller\User();$userAccount->invokeViewAccountPage($name); });
/*
 * Register
 */
$router->get('/user/register', function () { $userController = new \Application\Site\Controller\User();$userController->invokeRegisterPage(); });
$router->post('/user/register', function() { $userController = new Application\Site\Controller\User();$userController->createAccount($_POST); });
/*
 * Login
 */
$router->get('/user/login', function () { $userAccount = new \Application\Site\Controller\User();$userAccount->invokeLoginPage(); });
$router->post('user/login', function() { print_r($_POST); });

/*
 * Run
 */
$router->run();