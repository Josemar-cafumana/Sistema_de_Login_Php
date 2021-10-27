<?php

namespace Source\Controllers;

use Source\Models\Sql;
use Source\Models\User;

class Auth
{

    public function register($data)
    {

        $data = filter_var_array($data, FILTER_SANITIZE_STRING);

        $user = new User();

        $user->setData($data);

        // sOCIAL VALIDATE

        $user->save();

        if (isset($_SESSION["Google-login"])) {

            $this->socialValidate($data["Email"]);

        }

        $error = $user->error;

        echo json_encode($error);
    }

    public function login($data)
    {

        $data = filter_var_array($data, FILTER_SANITIZE_STRING);
        $user = new User();

        $user->setData($data);

        // Social  validATE
        if (isset($_SESSION["Google-login"])) {

            $this->socialValidate($data["Email"]);

        }
        $user->login();

        $error = $user->error;

        echo json_encode($error);

    }

    public function forgot($data)
    {

        $data = filter_var_array($data, FILTER_SANITIZE_STRING);

        $user = new User();

        $user->setData($data);

        $user->forgot();

        echo json_encode($user->error);
    }
    public function reset($data)
    {

        $data = filter_var_array($data, FILTER_SANITIZE_STRING);

        $user = new User();

        $user->setData($data);

        $user->reset();

        echo json_encode($user->error);

    }

    public function google()
    {

        $sql = new Sql();

        $google = new \League\OAuth2\Client\Provider\Google(GOOGLE);

        $error = filter_input(INPUT_GET, "error", FILTER_SANITIZE_STRING);
        $code = filter_input(INPUT_GET, "code", FILTER_SANITIZE_STRING);

        if (!$error && !$code) {
            $authUrl = $google->getAuthorizationUrl();
            header("Location: {$authUrl} ");
            return;
        }

        if ($error) {
            echo "<script>alert('Autourize por favor o login via Google');</script>";
            exit;
        }

        if ($code && empty($_SESSION["Google-login"])) {

            try {

                $token = $google->getAccessToken("authorization_code", [
                    "code" => $code,
                ]);
                $_SESSION["Google-login"] = serialize($google->getResourceOwner($token));

            } catch (\Throwable $th) {
                echo "<script>alert('Não foi possivel');</script>";

            }

        }

        $googleUser = unserialize($_SESSION["Google-login"]);

        // Find by google id

        $find_by_id = $sql->select("SELECT * FROM users WHERE google_id = :id", [
            ":id" => $googleUser->getId(),
        ]);

        if (!empty($find_by_id)) {

            print_r($find_by_id);
            unset($_SESSION["Google-login"]);

            $_SESSION["user"] = $find_by_id[0]["id"];

            // Redirecionar para Home
            header("Location: http://localhost/PHP/");

        }

        $find_by_email = $sql->select("SELECT * FROM users WHERE email = :e", [
            ":e" => $googleUser->getEmail(),
        ]);

        if (!empty($find_by_email)) {

            var_dump($find_by_email);
            // Redirecionar para Home
            echo "<h1>Fazer Login</h1>";
            header("Location: http://localhost/PHP/login");
            return;

        }

        header("Location: http://localhost/PHP/register");
// SE JA TEM UMA CONTA FAÇA LOGIN OU fAÇA UM REGISTRO

// Google user

    }

    public function socialValidate($email)
    {
        $sql = new Sql();

        $google = unserialize($_SESSION["Google-login"]);

        if ($email == $google->getEmail()) {

            $sql->query("UPDATE users SET google_id = :id WHERE email = :email", [

                ":id" => $google->getId(),
                ":email" => $email,
            ]);

        }
    }

}
