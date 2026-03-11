<?php
require_once 'PorscheController.php';

class PorscheImageController extends PorscheController {
    public $template = "image.twig";

    public function getContext(): array{
        $context = parent::getContext();
        $context['image'] = "/images/porsche.jpg";
        $context["is_imgActive"] = True;

        return $context;
    }
}

?>