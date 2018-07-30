<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Sielo/Core/autoloader.php';

session_start();

$router = new \Core\UrlRouter\Router((isset($_GET['url']) ? $_GET['url'] : '');

/*
 * Home
 */
$router->get('/', function () { if(\Core\Session\Session::isConnected()) header('Location: /Sielo/home'); else header('Location: /Sielo/presentation'); });
$router->get('/presentation', function () { $home = new \Application\Site\Controller\Home();$home->invokePresentationPage(); });
$router->get('/home', function () { $home = new \Application\Site\Controller\Home();$home->invokeHomePage(); });
/*
 * Galleries
 */
$router->get('/gallery/themes', function () { $themeListing = new \Application\Site\Controller\Themes();$themeListing->invokeListing(); });
$router->get('/gallery/themes/:name', function ($name) { $themeListing = new \Application\Site\Controller\ThemeGallery();$themeListing->invokeListing(); });
$router->get('/gallery/images', function () { $name = str_replace('-', ' ', $name); $themeListing = new \Application\Site\Controller\ThemeGallery();$themeListing->invokeThemePage($name); });
$router->get('/gallery/images/:name', function ($name) { $name = str_replace('-', ' ', $name); $themeListing = new \Application\Site\Controller\ThemeGallery();$themeListing->invokeThemePage($name); });
/*
 * Account
 */
$router->get('/account/listing', function () {});
$router->get('/account/user/:name', function ($name) { $name = str_replace('-', ' ', $name); $userAccount = new \Application\Site\Controller\User();$userAccount->invokeAccountPage($name); });
$router->get('/account/my', function () { $userAccount = new \Application\Site\Controller\User();$userAccount->invokeMyPage(); });
$router->post('/account/my/changes/password', function () {  });
$router->post('/account/my/changes/image', function () {  });
$router->post('/account/my/changes/nickname', function () {  });
$router->get('/account/lang', function () { $userAccount = new \Application\Site\Controller\User();$userAccount->invokeLangPage(); });
$router->post('/account/lang', function () { $userAccount = new \Application\Site\Controller\User();$userAccount->lang($_POST['lang']); });
/*
 * Join
 */
$router->get('/join', function () { $userAccount = new \Application\Site\Controller\User();$userAccount->invokeJoinPage(); });
$router->post('/join/login', function() { $userController = new Application\Site\Controller\User();$userController->login($_POST); });
$router->post('/join/register', function() { $userController = new Application\Site\Controller\User();$userController->createAccount($_POST); });
$router->get('/join/disconnect', function () { $userController = new Application\Site\Controller\User();$userController->disconnect(); });

/*
 * Run
 */
$router->run();
