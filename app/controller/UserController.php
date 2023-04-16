<?php

namespace Controller;

use Model\User;

class UserController extends User
{
    public function showUserName($userId)
    {
        return $this->getUser($userId);
    }
    public function showAllUsers()
    {
        return $this->getAllUsers();
    }
}
