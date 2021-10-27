<?php


define("ROOT","http://localhost/PHP");


function assets(string $path = null): string
{
    if ($path) {
        return ROOT . "/Views/{$path}";
    }
    return ROOT;
}


define("GOOGLE",[
    "clientId"=>"945753001125-i6ftubbdhsrr2rrli8o6rvll24j72aep.apps.googleusercontent.com",
    "clientSecret" => "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",
    "redirectUri" => "http://localhost/PHP/login/google"


]);