<?php

namespace Source\Models;

use Source\Models\Model;
use Source\Models\Sql;

class User extends Model
{

    public $error = [];

    public function save()
    {
        if (
            ($this->validateName() && $this->validateEmail()) &&
            ($this->validatePassword() && $this->validateConfPass())
        ) {

            $sql = new Sql();
            $sql->query("INSERT INTO users VALUES (null,:name,:email,:password,current_timestamp())", [

                ":name" => $this->getName(),
                ":email" => $this->getEmail(),
                ":password" => password_hash($this->getPassword(), PASSWORD_DEFAULT),

            ]);

            $this->error["message"] = "Cadastro com sucesso";

            return true;

        } else {

            $this->error["message"] = "Digite correctamente os campos";
            $this->validateName();
            $this->validateEmail();
            $this->validatePassword();

            return false;
        }

    }

    public function login()
    {

        if ($this->validateEmail(true) && $this->validatePassword()) {

            echo "<h1>Login com sucesso</h1>";
            $sql = new Sql();
             $results = $sql->select("SELECT * FROM users WHERE email = :email", [
            "email" =>  $this->getEmail(),
                ]);

        if(password_verify($this->getPassword(),$results[0]["password"])){

                $this->error["redirect"] = "home";
            
        }else{

            $this->error["message"] = "Digite corretamente os dados";
        }
        
    }else {
            
          $this->error["message"] = "Dados invalidos";
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

    public function validateEmail($login = false)
    {
        $email = $this->getEmail();

        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->error["email"] = "is-invalid";
            return false;
        }

        $sql = new Sql();
        $results = $sql->select("SELECT * FROM users WHERE email = :email", [
            "email" => $email
        ]);

        if (count($results) > 0) {

            if (!$login) {
                $this->error["email"] = "is-invalid";

                return false;
            } else {
                $this->error["email"] = "existe na base de dADOS";
                return true;
            }

        }else {

            if ($login === false) {
                $this->error["email"] = "is-valid";
                return true;
            }else {
                $this->error["email"] = "NAO EXISTE NA BASE DE DADOS";
                return false;
            }
        }

       

    }

}
