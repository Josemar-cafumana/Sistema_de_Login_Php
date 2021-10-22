<?php

namespace Source\Controllers;

use Source\Models\User;

class Auth
{

    public function register($data)
    {

        
        $data = filter_var_array($data, FILTER_SANITIZE_STRING);

        

        $user = new User();
        
        $user->setData($data);

        
        $user->save();
       
        $error = $user->error;
       
        echo json_encode($error);
    }

    public function login($data){

        $data = filter_var_array($data, FILTER_SANITIZE_STRING);
        $user = new User();
        
        $user->setData($data);

        $user->login();

        $error = $user->error;
       
        echo json_encode ($error);


    }

    public function forgot($data){

        $data = filter_var_array($data, FILTER_SANITIZE_STRING);
       
        $user = new User();
        
        $user->setData($data);

        $user->forgot();

        echo json_encode($user->error);
    }

}
