<?php

namespace Util;

class Auth
{
    public static function isLoggedIn()
    {
        if (!isset($_SESSION['fullName'])) {
            header('Location: ../../resource/view/auth/login.php');
        } else {
        }
    }
}
