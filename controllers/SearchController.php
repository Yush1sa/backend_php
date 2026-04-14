<?php

require_once "BaseBrandsTwigController.php";

class SearchController extends BaseBrandsTwigController
{
    public $template = "search.twig";

    public function getContext(): array
    {

        $context = parent::getContext();

        $country = $_GET["country"] ?? "";
        $title = $_GET["title"] ?? "";
        $info = $_GET["info"] ?? "";

        $sql = <<<EOL
        SELECT b.id, b.title, c.country
        FROM brands_objects AS b
        LEFT JOIN brands_country AS c ON b.country_id = c.id
        WHERE (:title = '' OR b.title LIKE CONCAT('%', :title, '%'))
        AND (:country = b.country_id OR :country = '')
        AND (:info = '' OR b.info LIKE CONCAT('%', :info, '%'))
        EOL;

        $query = $this->pdo->prepare($sql);
        $query->bindValue("title", $title);
        $query->bindValue("country", $country);
        $query->bindValue("info", $info);
        $query->execute();

        $context["objects"] = $query->fetchAll();

        return $context;

    }

}