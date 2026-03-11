<?php
require_once 'AudiController.php';

class AudiInfoController extends AudiController {
    public $template = "audi_info.twig";

    public function getContext(): array{
        $context = parent::getContext();
        $context["is_infoActive"] = True;

        return $context;
    }
}

?>