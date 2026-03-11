<?php
require_once 'PorscheController.php';

class PorscheInfoController extends PorscheController {
    public $template = "porsche_info.twig";

    public function getContext(): array{
        $context = parent::getContext();
        $context["is_infoActive"] = True;

        return $context;
    }
}

?>