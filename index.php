<?php

$rota = $_SERVER["REQUEST_URI"];
$metodo = $_SERVER["REQUEST_METHOD"];

require "./controller/SeriesController.php";

if ($rota === "/"){
    require "view/galeria1.php";
    exit();
}

if ($rota === "/favoritos"){
    require "view/favoritos.php";
    exit();
}

if ($rota === "/novaSerie"){
    if($metodo == "GET") require "view/cadastro.php";
    if($metodo == "POST") {
        $controller = new seriesController();
        $controller->save($_REQUEST);
    };
    exit();
}

if (substr($rota, 0, strlen("/favoritar")) === "/favoritar") {
    $controller = new seriesController();
    $controller->favorite(basename($rota));
    exit();
}

if (substr($rota, 0, strlen("/series")) === "/series") {
    if($metodo == "GET") require "view/galeria1.php";
    if($metodo == "DELETE"){
        $controller = new seriesController();
        $controller->delete(basename($rota));
    } 
    exit();
}


require "view/404.php";
