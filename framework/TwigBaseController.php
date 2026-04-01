<?php
require_once "BaseController.php";

class TwigBaseController extends BaseController {
    public $title = ""; 
    public $template = ""; 
    protected \Twig\Environment $twig;
    
    public function setTwig($twig) {
        $this->twig = $twig;
    }

    

    public function getContext() : array
    {
        $context = parent::getContext();
        $context['title'] = $this->title;

        return $context;
    }
    
    public function get(array $context) {
        $template = $this->getTemplate();

        $currentCode = http_response_code();
        if ($currentCode == 404) {
            $template = "404.twig";
        }

        echo $this->twig->render($template, $context);
    }

    public function getTemplate() {
        return $this->template;
    }
}