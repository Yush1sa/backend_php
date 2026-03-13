<?php

class ObjectController extends TwigBaseController {
    public $template = "__object.twig";
    public function getContext(): array {
        $context = parent::getContext();

        $query = $this->pdo->prepare("SELECT title, image, info, id FROM brands_objects WHERE id = :my_id");

        $query->bindValue("my_id", $this->params['id']);
        $query->execute();

        $data = $query->fetch();

        $context['title'] = $data['title'];
        $context['id'] = $data['id'];
        $context['info'] = $data['info'];
        $context['image'] = $data['image'];
    

        return $context;
    }
}