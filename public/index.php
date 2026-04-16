<?php

require_once '../vendor/autoload.php';
require_once '../framework/autoload.php';
require_once '../controllers/MainController.php';
require_once '../controllers/ObjectController.php';
require_once '../controllers/Controller404.php';
require_once '../controllers/SearchController.php';
require_once '../controllers/BrandsObjectCreateController.php';
require_once '../controllers/BrandsCountryCreateController.php';
require_once '../controllers/BrandsObjectDeleteController.php';
require_once '../controllers/BrandsObjectUpdateController.php';
require_once '../middlewares/LoginRequiredMiddleware.php';


$loader = new \Twig\Loader\FilesystemLoader('../views');

$twig = new \Twig\Environment($loader, [
    "debug" => true 
]);

$twig->addExtension(new \Twig\Extension\DebugExtension());

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=сar_brands', 'root', '');

$router = new Router($twig, $pdo);
$router->add("/", MainController::class);
$router->add("/brands-object/(?P<id>\d+)", ObjectController::class); 
$router->add("/search", SearchController::class);
$router->add("/brands-object/create-brand", BrandsObjectCreateController::class)
        ->middleware(new LoginRequiredMiddleware()); 
$router->add("/brands-object/create-country", BrandsCountryCreateController::class)
        ->middleware(new LoginRequiredMiddleware());
$router->add("/brands-object/(?P<id>\d+)/delete", BrandsObjectDeleteController::class)
        ->middleware(new LoginRequiredMiddleware());
$router->add("/brands-object/(?P<id>\d+)/edit", BrandsObjectUpdateController::class)
        ->middleware(new LoginRequiredMiddleware());

$router->get_or_default(Controller404::class);


