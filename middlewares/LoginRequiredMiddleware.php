<?php


class LoginRequiredMiddleware extends BaseMiddleware {
    public function apply(BaseController $controller, array $context) {
        // берем значения которые введет пользователь
        $is_logged = $_SESSION['is_logged'] ?? false;
        if (!$is_logged) {
            header("Location: /login");
            exit;
        }
    }
}