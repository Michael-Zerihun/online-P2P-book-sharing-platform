<?php

include '../../app/config/autoloader.php';

use Controller\LoginController;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = new LoginController($email, $password);
        $userInfo = $user->getUser();
        if (!$userInfo) {
            header('Location: ../../resource/view/auth/login.php');
        } else {
            session_start();
            $_SESSION['userId'] = $userInfo['userId'];
            $_SESSION['email'] = $userInfo['email'];
            $_SESSION['fullName'] = $userInfo['fullName'];
            $_SESSION['profilePic'] = $userInfo['profilePic'];
            if ((int)$userInfo['privilege'] === 62380) {
                header('Location: ../../resource/view/home.php');
            } else {
                header('Location: ../../resource/view/index.php');
            }
        }
    }
}
