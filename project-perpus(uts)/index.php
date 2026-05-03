<?php
session_start();

$url = $_GET['url'] ?? 'auth';

$url = explode("/", $url);

$controllerName = ucfirst($url[0]) . "Controller";
$method = $url[1] ?? "index";
$param = $url[2] ?? null;

require_once "app/controllers/$controllerName.php";

$controller = new $controllerName;

if ($param) {
    $controller->$method($param);
} else {
    $controller->$method();
}