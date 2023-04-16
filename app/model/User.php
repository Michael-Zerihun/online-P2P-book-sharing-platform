<?php

namespace Model;

use Database\MysqlDB;

class User extends MysqlDB
{
    protected function getUser($userId)
    {
        $sql = "SELECT `fullName` FROM user WHERE userId = '$userId'";
        if (mysqli_query($this->connect(), $sql)) {
            $result = mysqli_query($this->connect(), $sql);
            $name = mysqli_fetch_assoc($result);
            return $name;
        }
    }
    protected function getAllUsers()
    {
        $sql = "SELECT `userId`, `fullName`, `email`, `profilePic`, `dateJoined` FROM `user` WHERE `status` = 1";
        if (mysqli_query($this->connect(), $sql)) {
            $result = mysqli_query($this->connect(), $sql);
            $users = mysqli_fetch_all($result);
            return $users;
        }
    }
}
