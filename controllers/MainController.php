<?php
require_once "BaseBrandsTwigController.php";

class MainController extends BaseBrandTwigController {
    public $template = "main.twig";
    public $title = "Главная";
    

    public function getContext(): array
    {
        $context = parent::getContext(); 

        if (isset($_GET["type"])){
            $query = $this->pdo->prepare("SELECT * FROM brands_objects WHERE type = :type");
            $query->bindParam("type", $_GET["type"]);
            $query->execute();
        } else {
            $query = $this->pdo->query("SELECT * FROM brands_objects");
        }
    
        $context["brands_objects"] = $query->fetchAll();

        return $context;
    }
}
