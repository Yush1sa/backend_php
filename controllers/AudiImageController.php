<?php
require_once 'AudiController.php';

class AudiImageController extends AudiController {
    public $template = "image.twig";

    public function getContext(): array{
        $context = parent::getContext();
        $context['image'] = "https://i.pinimg.com/736x/af/92/18/af92182911955d13773e2e4229175166.jpg";
        $context["is_imgActive"] = True;

        return $context;
    }
}

?>