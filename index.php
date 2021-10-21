<?php

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
$router->get("/reset", "Web:reset", "web.reset");


$router->group(null);
$router->post("/login", "Auth:login");
$router->post("/register", "Auth:register", "auth.register");
$router->post("/forgot", "Auth:forgot", "auth.forgot");
$router->post("/reset", "Auth:reset");

$router->group("Error");
$router->get("/{errcode}", "Web:error", "web.error");




$router->dispatch();

if($router->error()){
    $router->redirect("/Error/{$router->error()}");
}
