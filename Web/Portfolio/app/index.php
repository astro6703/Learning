<?php


require "../vendor/autoload.php";
include "Core/Router.php";

$request = $_REQUEST;
$requestMethod = $_SERVER["REQUEST_METHOD"];
Router::route($request, $requestMethod);