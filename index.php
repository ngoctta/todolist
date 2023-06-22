<?php
# password ok1234
$controller = $_GET['controller'] ?? 'work';
$action = $_GET['action'] ?? 'index';

try {
    require 'controllers/' . ucfirst($controller) . 'Controller.php';
} catch (Exception $exception) {
    echo $exception->getMessage();
}

$controllerName = ucfirst($controller) . 'Controller';
$controller = new $controllerName();
$controller->$action();