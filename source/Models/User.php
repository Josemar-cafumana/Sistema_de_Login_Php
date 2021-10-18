<?php

namespace Source\Models;

use Source\Models\Model;

class User extends Model
{


    public $error = [];

    
     public function save()
    {
       if(
          ( $this->validateName() && $this->validateEmail() ) && 
           ($this->validatePassword() && $this->validateConfPass())
       ){
         
           return true;
       }else{
          $this->validateName();
          $this->validateEmail();
          $this->validatePassword();
          $this->validateConfPass();
           return false;
       }
       
    }

    public function login(){



        if($this->validateEmail() && $this->validatePassword() ){
            return true;
        }else{
            $this->validateEmail();
            $this->validatePassword();
            return false;
        }



        
    }
    public function validatePassword()
    {
        $password = $this->getPassword();

        if (empty($password) || strlen($password) < 8) {
           
            $this->error["password"] = "is-invalid";
        } else {
            $this->error["password"] = "is-valid";
        }
        return true;
    }

    public function validateConfPass()
    {
        $confpass = $this->getConfPassword();

        if (empty($confpass) || $confpass !== $this->getPassword()) {

            $this->error["confpass"] = "is-invalid";
            return false;

        } else {
            $this->error["confpass"] = "is-valid";
        }
        return true;
    }
    public function validateName()
    {
        $name = $this->getName();

        if (empty($name) || filter_var($name, FILTER_VALIDATE_INT)) {

            $this->error["name"] = "is-invalid";

            return false;
        } else {
            $this->error["name"] = "is-valid";
        }
        return true;

    }

    public function validateEmail()
    {
        $email = $this->getEmail();

        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->error["email"] = "is-invalid";
            return false;
        } else {
            $this->error["email"] = "is-valid";
        }
        return true;

    }

    

}
