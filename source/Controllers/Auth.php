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
        
    }

}
