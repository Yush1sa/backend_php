<?php

require_once "BaseBrandsTwigController.php";

class SearchController extends BaseBrandTwigController {
    public $template = "search.twig";

    public function getContext(): array {
        
        $context = parent::getContext();

        $type = $_GET["type"] ?? "";
        $title = $_GET["title"] ?? "";
        $info = $_GET["info"] ?? "";

        $sql = <<<EOL
        SELECT id, title 
        FROM brands_objects
        WHERE (:title = '' OR title like CONCAT('%', :title, '%'))
        AND (:type = type OR :type = '')
        AND (:info = '' OR info like CONCAT('%', :info, '%'))
        EOL;

        $query = $this->pdo->prepare($sql);
        $query->bindValue("title", $title);
        $query->bindValue("type", $type);
        $query->bindValue("info", $info);
        $query->execute();

        $context["objects"] = $query->fetchAll();
    

        return $context;
    
    }

}