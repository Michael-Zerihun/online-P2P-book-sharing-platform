<?php

include '../../app/config/autoloader.php';

use Controller\LoginController;
use Controller\SignupController;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email'])) {
        $fullName = $_POST['fullName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $rePass = $_POST['rePass'];

        $user = new SignupController($fullName, $email, $password, $rePass);
        if (!$user->createUser()) {
            header('Location: ../../resource/view/auth/signup.php');
        } else {
            $loginUser = new LoginController($email, $password);
            $userInfo = $loginUser->getUser();
            session_start();
            $_SESSION['userId'] = $userInfo['userId'];
            $_SESSION['email'] = $userInfo['email'];
            $_SESSION['fullName'] = $userInfo['fullName'];
            $_SESSION['profilePic'] = $userInfo['profilePic'];
            header('Location: ../../resource/view/index.php');
        }
    }
}
