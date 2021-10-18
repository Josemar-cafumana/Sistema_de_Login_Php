<?php

require_once(__DIR__."/App/autoload.php");
use CoffeeCode\Router\Router;


$router = new Router(ROOT);
$router->namespace("Source\Controllers");

$router->group(null);
$router->get("/", "Web:home");
$router->get("/login", "Web:login", "web.login");
$router->get("/register", "Web:register", "web.register");
$router->get("/forgot", "Web:forgot",  "web.forgot");
$router->get("/reset", "Web:reset", "web.reset");


$router->group(null);
$router->post("/login", "Web:login");
$router->post("/register", "Web:register");
$router->post("/forgot", "Web:forgot");
$router->post("/reset", "Web:reset");

$router->dispatch();


