<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Sielo/Application/Autoloader.php';

session_start();

$router = new \Core\UrlRouter\Router((isset($_GET['url'])) ? $_GET['url'] : '');

$router->get('/', function () { if(\Application\Site\Model\User::isConnected()) header('Location: /Sielo/home'); else header('Location: /Sielo/presentation'); });
$router->get('/presentation', function () { $home = new \Application\Site\Controller\Home();$home->invokePresentationPage(true); });
$router->get('/home', function () { $home = new \Application\Site\Controller\Home();$home->invokeHomePage(); });
/*
 * Theme listing
 */
$router->get('/theme/listing', function () { $themeListing = new \Application\Site\Controller\ThemeGallery();$themeListing->invokeListing(); });
$router->get('/theme/view/:name', function ($name) { $name = str_replace('-', ' ', $name); $themeListing = new \Application\Site\Controller\ThemeGallery();$themeListing->invokeThemePage($name); });
/*
 * User listing
 */
$router->get('/account/listing', function () {});
$router->get('/account/user/:name', function ($name) { $name = str_replace('-', ' ', $name); $userAccount = new \Application\Site\Controller\User();$userAccount->invokeAccountPage($name); });
$router->get('/account/my', function () { $userAccount = new \Application\Site\Controller\User();$userAccount->invokeMyPage(); });
/*
 * Login & Register
 */
$router->get('/join', function () { $userAccount = new \Application\Site\Controller\User();$userAccount->invokeJoinPage(); });
$router->post('/join/login', function() { $userController = new Application\Site\Controller\User();$userController->login($_POST); });
$router->post('/join/register', function() { $userController = new Application\Site\Controller\User();$userController->createAccount($_POST); });
$router->get('/join/disconnect', function () { $userController = new Application\Site\Controller\User();$userController->disconnect(); });

/*
 * Run
 */
$router->run();