<?php

class SetHistoryMiddleware extends BaseMiddleware
{
    public function apply(BaseController $controller, array $context)
    {

        if (!isset($_SESSION['history'])) {
            $_SESSION['history'] = [];
        }

        $currentUrl = $_SERVER['REQUEST_URI'];

        if (end($_SESSION['history']) !== $currentUrl) {
            array_push($_SESSION['history'], $currentUrl);
        }

        if (count($_SESSION['history']) > 10) {
            array_shift($_SESSION['history']);
        }
        

    }

}