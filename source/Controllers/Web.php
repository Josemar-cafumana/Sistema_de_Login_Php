<?php

namespace Source\Controllers;
use League\Plates\Engine;

class Web
{
    private $view;

    public function __construct($router)
    {
        $this->view = Engine::create(__DIR__."/../../Views","php");

        $this->view->addData([
            "router"=>$router,
            "style"=>true
            
        ]);
    }

    public function home(){

        echo $this->view->render("home",[
            "title"=>"Login"
        ]);

    }
    public function login(){

       echo $this->view->render("Login",[
           "title"=>"Login"
       ]);
    }
    public function register(){

        echo $this->view->render("Register",[
            "title"=>"Register",
            "style"=> false
        ]);
     }
     public function forgot(){

        echo $this->view->render("Forgot",[
            "title"=>"Forgot"
        ]);
     }
     public function reset(){

        echo $this->view->render("Reset",[
            "title"=>"Reset Password"
        ]);
     }
    
 
 










}