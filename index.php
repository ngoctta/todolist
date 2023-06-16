<?php

$controller = $_GET['controller'] ?? 'work';
$action = $_GET['action'] ?? 'index';

try {
    require 'controllers/WorkController.php';
} catch (Exception $exception) {
    echo $exception->getMessage();
}

$controllerName = ucfirst($controller) . 'Controller';
$controller = new $controllerName();
$controller->$action();