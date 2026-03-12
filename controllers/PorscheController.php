<?php
require_once "TwigBaseController.php";



class PorscheController extends TwigBaseController {
    public $template = "__object.twig";
    public $title = "Porsche";

    public function getContext(): array{
        $context = parent::getContext();

        $context['image_url'] = "/porsche/image";
        $context['info_url'] = "/porsche/info";

        return $context;
    }
}

?>