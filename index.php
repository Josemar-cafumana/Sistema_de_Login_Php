<?php
ob_start();
session_start();

require_once(__DIR__."/App/autoload.php");
use CoffeeCode\Router\Router;


$router = new Router(ROOT);
$router->namespace("Source\Controllers");

$router->group(null);
$router->get("/", "Web:home", "web.home");
$router->get("/login", "Web:login", "web.login");
$router->get("/register", "Web:register", "web.register");
$router->get("/forgot", "Web:forgot",  "web.forgot");
$router->get("/reset/{email}/{forget}", "Web:reset", "web.reset");
$router->get("/sair", "Web:sair", "web.sair");

$router->group(null);
$router->post("/login", "Auth:login");
$router->post("/register", "Auth:register", "auth.register");
$router->post("/forgot", "Auth:forgot", "auth.forgot");
$router->post("/reset", "Auth:reset","auth.reset");


$router->group(null);
$router->get("/login/google", "Auth:google", "auth.google");

$router->group("Error");
$router->get("/{errcode}", "Web:error", "web.error");




$router->dispatch();

if($router->error()){
    $router->redirect("/Error/{$router->error()}");
}


ob_end_flush();