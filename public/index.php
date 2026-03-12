<?php

require_once '../vendor/autoload.php';
require_once '../controllers/MainController.php';
require_once '../controllers/AudiController.php';
require_once '../controllers/AudiImageController.php';
require_once '../controllers/AudiInfoController.php';
require_once '../controllers/Controller404.php';
require_once '../controllers/PorscheController.php';
require_once '../controllers/PorscheImageController.php';
require_once '../controllers/PorscheInfoController.php';

$loader = new \Twig\Loader\FilesystemLoader('../views');

$twig = new \Twig\Environment($loader, [
    "debug" => true 
]);
$twig->addExtension(new \Twig\Extension\DebugExtension());
$url = $_SERVER["REQUEST_URI"];


$template = '';
$title = '';
$context = [];

$controller = new Controller404($twig);

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=сar_brands', 'root', '');


if ($url == '/'){
    $controller = new MainController($twig);
} elseif (preg_match("#^/audi#", $url)){
    $controller = new AudiController($twig);
    if (preg_match("#^/audi/image#", $url)){
        $controller = new AudiImageController($twig);
    } elseif (preg_match("#^/audi/info#", $url)){
        $controller = new AudiInfoController($twig);
    }
} elseif (preg_match("#^/porsche#", $url)){
    $controller = new PorscheController($twig);

    if (preg_match("#^/porsche/image#", $url)){
        $controller = new PorscheImageController($twig);
    } elseif (preg_match("#^/porsche/info#", $url)){
        $controller = new PorscheInfoController($twig);
    }
} 


if ($controller) {
    $controller->setPDO($pdo);
    $controller->get();
}

?>