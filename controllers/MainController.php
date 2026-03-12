<?php
require_once "TwigBaseController.php";



class MainController extends TwigBaseController {
    public $template = "main.twig";
    public $title = "Главная";
    
    

    public function getContext(): array
    {
        $context = parent::getContext(); 

        $query = $this->pdo->query("select * from brands_objects");
        $context['brands_objects'] = $query->fetchAll();

        $context["menu_home"] = [
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
        

        return $context;
    }
}
?>