<?php

namespace Source\Models;

use League\Plates\Engine;
use Source\Models\Email;
use Source\Models\Model;
use Source\Models\Sql;

class User extends Model
{

    public $error = [];
    private $view;

    public function __construct()
    {
        $this->view = Engine::create(__DIR__ . "/../../Views", "php");

    }

    public function save()
    {
        if (
            ($this->validateName() && $this->validateEmail()) &&
            ($this->validatePassword() && $this->validateConfPass())
        ) {

            $sql = new Sql();
            $sql->query("INSERT INTO users VALUES (null,:name,:email,:password,'','',current_timestamp())", [

                ":name" => $this->getName(),
                ":email" => $this->getEmail(),
                ":password" => password_hash($this->getPassword(), PASSWORD_DEFAULT),

            ]);

            $this->error["message"] = "Cadastro com sucesso";
            $this->error["redirect"] = true;
            $_SESSION["user"] = true;
            return true;

        } else {

            $this->error["message"] = "Digite correctamente os campos";
            $this->validateName();
            $this->validateEmail();
            $this->validatePassword();
            $this->validateConfPass();
            return false;
        }

    }

    public function login()
    {

        if ($this->validateEmail(true) && $this->validatePassword()) {

            $sql = new Sql();
            $results = $sql->select("SELECT * FROM users WHERE email = :email", [
                "email" => $this->getEmail(),
            ]);

            if (password_verify($this->getPassword(), $results[0]["password"])) {

                $this->error["redirect"] = true;
                $_SESSION["user"] = true;
                $this->error["success"] = "Logado com sucesso";

            } else {

                $this->error["message"] = "Email ou senha invalida.";
            }

        } else {

            $this->error["message"] = "Digite corretamente os dados";
            return false;
        }

    }

    public function forgot()
    {

        $email = $this->getEmail();

        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->error["message"] = "Digite um endereço de email valido";
            return false;
        }
        if ($this->validateEmail(true)) {

            $forget = bin2hex(random_bytes(16));
            $this->error["message"] = "Verifique sua conta de E-MAIL para redefinir a senha";
            $this->error["redirect"] = true;
            $sql = new Sql();
            $sql->query("UPDATE users SET forget = :forget WHERE id = :id", [
                ":forget" => $forget,
                ":id" => $this->getid(),
            ]);

            $_SESSION["forget"] = $this->getid();
            $body = '<h4>Presado(a) </h4><p>Recebemos em nosso site uma solicitação para recuperar sua senha, por favor, caso não tenha solicitado
            favor ignore este e-mail. Caso contrário...</p>
        <p><a href="http://localhost/PHP/reset/'.$email.'/'.$forget.'" title="Recuperar Senha">CLIQUE AQUI PARA RECUPERAR SUA SENHA</a></p>
        <p>Atenciosamente Suporte Block</p>
        </div>';

            $mail = new Email();
            $mail->sendEmail($email, "Recuperação de Senha", $body);
            return true;
        } else {
            $this->validateEmail(true);
            $this->error["message"] = "Este endereço não está cadastrado";

            return false;
        }
    }
    public function reset()
    {

        if($this->validatePassword() && $this->validateConfPass()){

            $sql = new Sql();
           $result = $sql->select("SELECT * FROM users where id = :id",[
                ":id" => $_SESSION["forget"]
            
            ]);

            if(count($result)>0){

                $sql->query("UPDATE users SET password = :password WHERE id = :id",[
                        ":password"=> password_hash($this->getPassword(), PASSWORD_DEFAULT),
                        ":id" => $_SESSION["forget"]
                ]);

                unset($_SESSION["forget"]);
                $this->error["redirect"] = true;
            }else{

                $this->error["message"] = "Faça login na sua conta";
            }
            return true;
        }else{
            return false;
        }

    }
    public function validatePassword()
    {
        $password = $this->getPassword();

        if (empty($password) || strlen($password) < 8) {

            $this->error["password"] = "is-invalid";
            return false;
        } else {
            $this->error["password"] = "is-valid";
        }
        return true;
    }

    public function validateConfPass()
    {
        $confpass = $this->getConfPassword();

        if (empty($confpass) || $confpass !== $this->getPassword()) {
            if ($this->getPassword() !== "") {
                $this->error["confpass"] = "is-invalid";
            }
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
            "email" => $email,
        ]);

        if (count($results) > 0) {

            if (!$login) {
                $this->error["email"] = "is-invalid";
                $this->error["message"] = "Este endereço ja foi cadastrado";

                return false;
            } else {
                $this->error["email"] = "existe na base de dADOS";
                $this->setData($results[0]);
                return true;
            }

        } else {

            if ($login === false) {
                $this->error["email"] = "is-valid";
                return true;
            } else {
                $this->error["email"] = "NAO EXISTE NA BASE DE DADOS";
                return false;
            }
        }

    }

}
