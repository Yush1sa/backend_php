<?php
require_once "TwigBaseController.php";



class AudiController extends TwigBaseController {
    public $template = "__object.twig";
    public $title = "AUDI";

    public function getContext(): array{
        $context = parent::getContext();

        $context['image_url'] = "/audi/image";
        $context['info_url'] = "/audi/info";

        return $context;
    }
}

?>