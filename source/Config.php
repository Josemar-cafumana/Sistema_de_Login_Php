<?php


define("ROOT","http://localhost/PHP");


function assets(string $path = null): string
{
    if ($path) {
        return ROOT . "/Views/{$path}";
    }
    return ROOT;
}