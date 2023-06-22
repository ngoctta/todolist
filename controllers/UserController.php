<?php

require_once 'models/Database.php';
require_once 'models/User.php';

class UserController
{
    private $model;

    public function __construct()
    {
        $database = new Database();
        $connection = $database->getConnection();
        $this->model = new User($connection);
    }



    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require 'views/user/login.php';
        }
        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordDB = $this->model->getPasswordByUsername($username);
        if (password_verify($password, $passwordDB))
        {
            session_start();
            $_SESSION['authenticated'] = true;
            $_SESSION['username'] = $username;
            header('Location: index.php');
            exit;
        } else {
            echo "Tên đăng nhập hoặc mật khẩu không đúng!";
        }


    }
}