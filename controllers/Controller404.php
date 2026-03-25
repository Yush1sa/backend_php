<?php
require_once "BaseBrandsTwigController.php";

class Controller404 extends BaseBrandTwigController {
    public $template = "404.twig"; 
    public $title = "Страница не найдена";

    public function get(){
        http_response_code(404);
        parent::get();
    }
}
