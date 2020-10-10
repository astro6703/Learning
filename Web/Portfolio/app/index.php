<?php


require_once "../vendor/autoload.php";
require_once "Core/Router.php";

$request = $_REQUEST;
$requestMethod = $_SERVER["REQUEST_METHOD"];
Router::route($request, $requestMethod);