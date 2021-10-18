<?php

namespace Source\Models;

use Source\Models\Model;

class User extends Model
{


     public function save()
    {
       if(
           $this->validateName() && $this->validateEmail() && 
           $this->validatePassword() && $this->validateConfPass()
       ){
           echo "<h1>Salvo no banco</h1>";
           return true;
       }else{
           echo "<h1>Erro ao salvar</h1>";
           return false;
       }
       
    }
    public function validateName()
    {
        $name = $this->getName();

        if (empty($name) || filter_var($name, FILTER_VALIDATE_INT)) {

            echo "<H1>DIGITE OS NOMES</H1>";

            return false;
        } else {
            echo "<H1>cORRECTO</H1>";
        }
        return true;

    }

    public function validateEmail()
    {
        $email = $this->getEmail();

        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<H1>dIGITE UM ENDREÇO DE EMAIL VALIDO</H1>";
            return false;
        } else {
            echo "<h1>valido</h1>";
        }
        return true;

    }

    public function validatePassword()
    {
        $password = $this->getPassword();

        if (empty($password) || strlen($password) < 8) {
            echo "<h1>A palavra passe deve conter pelo menos 8 caracteres</h1>";
            return false;
        } else {
            echo "<h1>Valido</h1>";
        }
        return true;
    }

    public function validateConfPass()
    {
        $confpass = $this->getConfPassword();

        if (empty($confpass) || $confpass !== $this->getPassword()) {

            echo "<h1>Confirme  A SENHA</h1>";
            return false;

        } else {
            echo "<H1>vALIDO</H1>";
        }
        return true;
    }

}
