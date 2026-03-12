<?php
require_once 'PorscheController.php';

class PorscheImageController extends PorscheController {
    public $template = "image.twig";

    public function getContext(): array{
        $context = parent::getContext();
        $context['image'] = "https://i.pinimg.com/1200x/43/11/1a/43111ac65e80903e5c05b6981b63653f.jpg";
        $context["is_imgActive"] = True;

        return $context;
    }
}

?>