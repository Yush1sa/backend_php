<?php
require_once 'AudiController.php';

class AudiImageController extends AudiController {
    public $template = "image.twig";

    public function getContext(): array{
        $context = parent::getContext();
        $context['image'] = "/images/audi.png";
        $context["is_imgActive"] = True;

        return $context;
    }
}

?>