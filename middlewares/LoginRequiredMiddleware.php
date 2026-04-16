<?php


class LoginRequiredMiddleware extends BaseMiddleware {
    public function apply(BaseController $controller, array $context) {
        // берем значения которые введет пользователь
        $user = $_SERVER['PHP_AUTH_USER'] ?? '';
        $password = $_SERVER['PHP_AUTH_PW'] ?? '';
        
        $query = $controller->pdo->prepare("SELECT * FROM users WHERE username = :user");
        $query->bindValue('user', $user);
        $query->execute();

        $user_data = $query->fetch();

        // сверяем с корректными
        if (!$user_data || $user_data['password'] != $password) {
            header('WWW-Authenticate: Basic realm="Brands objects"');
            http_response_code(401);
            echo "Доступ запрещен";
            exit;
        }
    }
}