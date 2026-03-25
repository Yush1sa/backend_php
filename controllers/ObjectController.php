<?php

use const Dom\NOT_FOUND_ERR;

require_once "BaseBrandsTwigController.php";

class ObjectController extends BaseBrandTwigController
{

    public $template = "__object.twig";
    public function getContext(): array
    {
        $context = parent::getContext();

        $query = $this->pdo->prepare("SELECT title, image, info, id FROM brands_objects WHERE id = :my_id");

        $query->bindValue("my_id", $this->params['id']);
        $query->execute();

        $data = $query->fetch();

        if (!$data) {
            throw new NotFoundException();
        }
        
        $context['id'] = $data['id'];
        $context['title'] = $data['title'];

 
        if (isset($_GET["show"])){
            $show = $_GET["show"];
            if ($show == "image"){
                $context["is_imgActive"] = true;
                $context['image'] = $data['image'];
            } elseif ($show == "info") {
                $context["is_infoActive"] = true;
                $context['info'] = $data['info'];
            }
        }

        return $context;
    }

    public function getTemplate() : string {
        $show = $_GET["show"] ?? '';
        if ($show == "image") {
            return "object_image.twig";
        } 
        if ($show == "info") {
            return "object_info.twig";
        }
        return parent::getTemplate();
    }
}