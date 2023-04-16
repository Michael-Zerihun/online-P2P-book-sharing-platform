<?php

namespace Controller;

use Model\Login;
use Util\DataCleaner;
use Util\Validator;

class LoginController extends Login
{
    private $email;
    private $password;

    public function __construct($email, $password)
    {
        $this->email = DataCleaner::sanitizeInput(strip_tags($email));
        $this->password = DataCleaner::sanitizeInput(strip_tags($password));
    }
    private function isFormValid()
    {
        if (!Validator::isValidEmail($this->email) and !Validator::isValidLength($this->password, 8)) {
            return false;
        } else {
            return true;
        }
    }

    public function getUser()
    {
        if (!$this->isFormValid()) {
            return false;
        }
        $isValid = $this->isValidCredential($this->email, $this->password);
        if (!$isValid) {
            return false;
        }else {
            return $isValid;
        }
    }
}
