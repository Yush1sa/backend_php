<?php
require_once "BaseBrandsTwigController.php";

class MainController extends BaseBrandsTwigController {
    public $template = "main.twig";
    public $title = "Главная";
    

    public function getContext(): array
    {
        $context = parent::getContext(); 

        if (isset($_GET["country"])){
            $sql =  $sql = <<<EOL
                SELECT b.* FROM brands_objects as b
                LEFT JOIN brands_country as c ON b.country_id = c.id
                WHERE :country = b.country_id
            EOL;
            $query = $this->pdo->prepare($sql);
            $query->bindParam("country", $_GET["country"]);
            $query->execute();
        } else {
            $query = $this->pdo->query("SELECT * FROM brands_objects");
        }
    
        $context["brands_objects"] = $query->fetchAll();

        return $context;
    }
}
