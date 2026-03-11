<?php

require_once '../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('../views');

$twig = new \Twig\Environment($loader);

$url = $_SERVER["REQUEST_URI"];

$menu_home = [
    [
        "object" => "Audi",
        "urlObject" => "/audi",
        "urlObjectImage" => "/audi/image",
        "urlObjectInfo" => "/audi/info",
    ],
    [
        "object" => "Porsche",
        "urlObject" => "/porsche",
        "urlObjectImage" => "/porsche/image",
        "urlObjectInfo" => "/porsche/info",
    ]
];



$template = '';
$title = '';
$context = [];

if ($url == '/'){
    $template = "main.twig";
    $title = "Главная";
} elseif (preg_match("#^/audi#", $url)){
    $title = "AUDI";
    $template = "__object.twig";

    $context['image_url'] = "/audi/image";
    $context['info_url'] = "/audi/info";
    $context['objectTitle'] = "AUDI";

    if (preg_match("#^/audi/image#", $url)){
        $template = "image.twig";
        $context['image'] = "/images/audi.png";
        $context["is_imgActive"] = True;
    } elseif (preg_match("#^/audi/info#", $url)){
        $template = "audi_info.twig";
        $context["is_infoActive"] = True;
    }
} elseif (preg_match("#^/porsche#", $url)){
    $title = "PORSCHE";
    $template = "__object.twig";

    $context['image_url'] = "/porsche/image";
    $context['info_url'] = "/porsche/info";
    $context['objectTitle'] = "PORSCHE";

    if (preg_match("#^/porsche/image#", $url)){
        $template = "image.twig";
        $context['image'] = "/images/porsche.jpg";
        $context["is_imgActive"] = True;
    } elseif (preg_match("#^/porsche/info#", $url)){
        $template = "porsche_info.twig";
        $context["is_infoActive"] = True;
    }
} 

$context['title'] = $title;
$context['menu_home'] = $menu_home;


echo $twig->render($template, $context);

?>