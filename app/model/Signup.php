<?php

namespace Model;

use Database\MysqlDB;

class Signup extends MysqlDB
{
    protected function addUser($fullName, $email, $password)
    {
        $sql = "INSERT INTO `user` (`fullName`, `email`, `password`) 
                VALUES ('$fullName', '$email', '$password');";
        return mysqli_query($this->connect(), $sql);
    }

    // TODO: how to create an account if the user delete account and try to create a new one again
    protected function userExists($email)
    {
        $sql = "SELECT email FROM user WHERE email = '$email'";
        if (mysqli_query($this->connect(), $sql)) {
            $result = mysqli_query($this->connect(), $sql);
            $emailCol = mysqli_fetch_assoc($result);
            if ($emailCol == null) {
                return false;
            } else
                return true;
        }
    }
}
