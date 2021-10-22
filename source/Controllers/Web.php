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
            "title"=>"Home"
        ]);

    }
    public function login(){
        if(isset($_SESSION["user"])){
            header("location: http://localhost/php/");
              exit;
          }
       echo $this->view->render("Login",[
           "title"=>"Login"
       ]);
    }
    public function register(){
        if(isset($_SESSION["user"])){
           header("location: http://localhost/php/");
             exit;
         }

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

        
        if(!isset($_SESSION["wforget"])){
            header("location: http://localhost/php/login");
              exit;
          }else{      
              echo $this->view->render("Reset",[
            "title"=>"Reset Password"
        ]);
    }
     }
     public function error($data){

        echo $this->view->render("Error",[
            "title"=>"Error Page",
            "error"=>$data["errcode"]
        ]);
     }
    
 
 










}