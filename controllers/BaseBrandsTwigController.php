<?php

class BaseBrandsTwigController extends TwigBaseController {
    public function getContext() : array{
        $context = parent::getContext();
        
        $query = $this->pdo->query("SELECT DISTINCT type from brands_objects ORDER BY 1");
        $types = $query->fetchAll();
        $context["types"] = $types;

        return $context;
    }
}