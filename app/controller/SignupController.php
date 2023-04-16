<?php
namespace Controller;

use Model\Signup;
use Util\DataCleaner;
use Util\Validator;

class SignupController extends Signup
{
    private $fullName;
    private $email;
    private $password;
    private $repeatPassword;

    public function __construct($fullName, $email, $password, $repeatPassword)
    {
        $this->fullName = DataCleaner::sanitizeInput(strip_tags($fullName));
        $this->email = DataCleaner::sanitizeInput(strip_tags($email));
        $this->password = DataCleaner::sanitizeInput(strip_tags($password));
        $this->repeatPassword = DataCleaner::sanitizeInput(strip_tags($repeatPassword));
        
    }
    private function isFormValid()
    {
        if ($this->password !== $this->repeatPassword) {
            return false;
        }
        // TODO: the length of the password may vary if depending on whether the password has 
        // special character or not due to the sanitization process
        if (!Validator::isValidEmail($this->email) and !Validator::isValidLength($this->password, 8)) {
            return false;
        } else {
            if(str_contains($this->password, "'") or str_contains($this->fullName, "'")){
                return false;
            }
            return true;
        }
    }

    public function createUser()
    {
        if (!$this->isFormValid()) {
            return false;
        }
        if ($this->userExists($this->email)) {
            return false;
        } else {
            $this->addUser($this->fullName, $this->email, $this->password);
            return true;
        }
    }
}
