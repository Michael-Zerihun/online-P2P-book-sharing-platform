<?php

namespace Model;

use Database\MysqlDB;

class Login extends MysqlDB
{
    protected function isValidCredential($email, $password)
    {
        $sql = "SELECT `userId`, `fullName`, `email`, `profilePic`,`privilege`
                FROM `user` WHERE `email` = '$email' 
                AND `password` = '$password' AND `status` = 1 ";
        if (mysqli_query($this->connect(), $sql)) {
            $result = mysqli_query($this->connect(), $sql);
            $userRow = mysqli_fetch_assoc($result);
            print_r($userRow);
            if ($userRow == null) {
                return false;
            } else{
                return $userRow;
            }
        }
    }
}
