<?php

class LoginController extends BaseBrandsTwigController {

    public $template = "login.twig";

    public function get(array $context) {
        parent::get($context);
    }

    public function post(array $context) {
        $login = $_POST['login'];
        $password = $_POST['password'];

        $query = $this->pdo->prepare("SELECT * FROM users WHERE username = :user");
        $query->bindValue('user', $login);
        $query->execute();

        $user_data = $query->fetch();

        if (!$user_data && !$user_data['password'] == $password) {
            header("Location: /login");
            exit;
        } else{
            $_SESSION['is_logged'] = true;
            header("Location: /");
            exit;
        }
    }
}