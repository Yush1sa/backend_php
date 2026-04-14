<?php

class BaseBrandsTwigController extends TwigBaseController {
    public function getContext() : array{
        $context = parent::getContext();
        
        $query = $this->pdo->query("SELECT id, country from brands_country ORDER BY 1");
        $countries = $query->fetchAll();
        $context["countries"] = $countries;

        return $context;
    }
}